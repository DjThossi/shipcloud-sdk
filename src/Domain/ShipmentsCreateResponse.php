<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Domain;

class ShipmentsCreateResponse extends Response
{
    protected const RESPONSE_KEY_ID = 'id';
    protected const RESPONSE_KEY_CARRIER_TRACKING_NO = 'carrier_tracking_no';
    protected const RESPONSE_KEY_CARRIER_TRACKING_URL = 'carrier_tracking_url';
    protected const RESPONSE_KEY_TRACKING_URL = 'tracking_url';
    protected const RESPONSE_KEY_LABEL_URL = 'label_url';
    protected const RESPONSE_KEY_PRICE = 'price';

    protected const ALL_RESPONSE_KEYS = [
        self::RESPONSE_KEY_ID,
        self::RESPONSE_KEY_CARRIER_TRACKING_NO,
        self::RESPONSE_KEY_CARRIER_TRACKING_URL,
        self::RESPONSE_KEY_TRACKING_URL,
        self::RESPONSE_KEY_LABEL_URL,
        self::RESPONSE_KEY_PRICE,
    ];

    public function __construct(
        int $statusCode,
        array $headers,
        string $body,
    ) {
        parent::__construct($statusCode, $headers, $body);

        $this->ensureBody();
    }

    public function getBodyAsObject(): ShipmentsCreate
    {
        $body = $this->getBodyAsArray();

        return new ShipmentsCreate(
            new Id($body[self::RESPONSE_KEY_ID]),
            new CarrierTrackingNo($body[self::RESPONSE_KEY_CARRIER_TRACKING_NO]),
            new CarrierTrackingUrl($body[self::RESPONSE_KEY_CARRIER_TRACKING_URL]),
            new TrackingUrl($body[self::RESPONSE_KEY_TRACKING_URL]),
            new LabelUrl($body[self::RESPONSE_KEY_LABEL_URL]),
            new Price($body[self::RESPONSE_KEY_PRICE]),
        );
    }

    private function ensureBody(): void
    {
        $body = $this->getBodyAsArray();

        foreach (self::ALL_RESPONSE_KEYS as $responseKey) {
            if (!isset($body[$responseKey])) {
                $message = \sprintf(
                    'The key %s is missing in the response. Only the keys %s are available',
                    $responseKey,
                    implode(', ', array_keys($body))
                );

                throw new InvalidResponseBodyException($message);
            }
        }
    }
}
