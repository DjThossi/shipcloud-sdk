<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Domain;

use DjThossi\ShipcloudSdk\Domain\InvalidResponseBodyException;
use DjThossi\ShipcloudSdk\Domain\ShipmentsCreateResponse;
use PHPUnit\Framework\TestCase;

class ShipmentsCreateResponseTest extends TestCase
{
    public const STATUS_CODE = 200;

    private const BODY = '{"id": "1", "carrier_tracking_no": "2", "carrier_tracking_url": "https://www.example.com/#1", "tracking_url": "https://www.example.com/#2", "label_url": "https://www.example.com/#3", "price": 0.0}';

    public function testGetBodyAsObject(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertEquals('1', $response->getBodyAsObject()->getId()->asString());
    }

    public function testThrowsExceptionWhenKeyIsMissing(): void
    {
        $this->expectException(InvalidResponseBodyException::class);
        $this->createWorkingResponseObject('{"id": "1"}');
    }

    private function createWorkingResponseObject(string $body = self::BODY): ShipmentsCreateResponse
    {
        return new ShipmentsCreateResponse(
            self::STATUS_CODE,
            [
                'RateLimit-Limit' => ['120'],
                'RateLimit-Interval' => ['60'],
                'RateLimit-Remaining' => ['111'],
                'RateLimit-Reset' => ['42'],
            ],
            $body
        );
    }
}
