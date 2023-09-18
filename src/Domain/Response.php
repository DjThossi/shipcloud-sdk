<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Domain;

class Response
{
    public function __construct(
        protected readonly int $statusCode,
        protected readonly array $headers,
        protected readonly string $body
    ) {
        $this->ensureRateLimitHeadersExist();
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getBodyAsArray(): array
    {
        if (trim($this->body) === '') {
            return [];
        }

        return json_decode($this->body, true, 512, \JSON_THROW_ON_ERROR);
    }

    public function getBodyAsObject(): object
    {
        if (trim($this->body) === '') {
            return new \stdClass();
        }

        return json_decode($this->body, false, 512, \JSON_THROW_ON_ERROR);
    }

    public function wasSuccessful(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode <= 299;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getRateLimit(): RateLimit
    {
        return new RateLimit(
            (int) $this->headers['RateLimit-Limit'][0],
            (int) $this->headers['RateLimit-Interval'][0],
            (int) $this->headers['RateLimit-Remaining'][0],
            (int) $this->headers['RateLimit-Reset'][0]
        );
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    private function ensureRateLimitHeadersExist(): void
    {
        if (!isset($this->headers['RateLimit-Limit'][0])) {
            throw new MissingRateLimitHeaderException('The header RateLimit-Limit is missing');
        }

        if (!isset($this->headers['RateLimit-Interval'][0])) {
            throw new MissingRateLimitHeaderException('The header RateLimit-Interval is missing');
        }

        if (!isset($this->headers['RateLimit-Remaining'][0])) {
            throw new MissingRateLimitHeaderException('The header RateLimit-Remaining is missing');
        }

        if (!isset($this->headers['RateLimit-Reset'][0])) {
            throw new MissingRateLimitHeaderException('The header RateLimit-Reset is missing');
        }
    }
}
