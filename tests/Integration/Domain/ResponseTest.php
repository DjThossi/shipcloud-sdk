<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Integration\Domain;

use DjThossi\ShipcloudSdk\Domain\MissingRateLimitHeaderException;
use DjThossi\ShipcloudSdk\Domain\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public const STATUS_CODE = 200;
    private const RATE_LIMIT_LIMIT_VALUE = 120;
    private const RATE_LIMIT_INTERVAL_VALUE = 60;
    private const RATE_LIMIT_REMAINING_VALUE = 111;
    private const RATE_LIMIT_RESET_VALUE = 42;
    private const BODY = '{"foo": "bar"}';

    public function testGetBody(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertEquals(self::BODY, $response->getBody());
    }

    public function testGetBodyAsArray(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }

    public function testGetEmptyBodyAsArray(): void
    {
        $response = $this->createWorkingResponseObject('');
        $this->assertEquals([], $response->getBodyAsArray());
    }

    public function testGetBodyAsObject(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertObjectHasProperty('foo', $response->getBodyAsObject());
        $this->assertEquals('bar', $response->getBodyAsObject()->foo);
    }

    public function testGetEmptyBodyAsObject(): void
    {
        $response = $this->createWorkingResponseObject('');
        $this->assertEquals(new \stdClass(), $response->getBodyAsObject());
    }

    public function testWasSuccessful(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertTrue($response->wasSuccessful());
    }

    public function testGetStatusCode(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertEquals(self::STATUS_CODE, $response->getStatusCode());
    }

    public function testGetRateLimit(): void
    {
        $rateLimit = $this->createWorkingResponseObject()->getRateLimit();
        $this->assertEquals(self::RATE_LIMIT_LIMIT_VALUE, $rateLimit->getLimit());
        $this->assertEquals(self::RATE_LIMIT_INTERVAL_VALUE, $rateLimit->getInterval());
        $this->assertEquals(self::RATE_LIMIT_REMAINING_VALUE, $rateLimit->getRemaining());
        $this->assertEquals(self::RATE_LIMIT_RESET_VALUE, $rateLimit->getReset());
    }

    public function testGetHeaders(): void
    {
        $response = $this->createWorkingResponseObject();
        $this->assertEquals($this->createWorkingHeaders(), $response->getHeaders());
    }

    public function testMissingRateLimitLimitHeaderThrowsException(): void
    {
        $headers = $this->createWorkingHeaders();
        unset($headers['RateLimit-Limit']);

        $this->expectException(MissingRateLimitHeaderException::class);
        $this->expectExceptionMessage('The header RateLimit-Limit is missing');
        new Response(self::STATUS_CODE, $headers, self::BODY);
    }

    public function testMissingRateLimitIntervalHeaderThrowsException(): void
    {
        $headers = $this->createWorkingHeaders();
        unset($headers['RateLimit-Interval']);

        $this->expectException(MissingRateLimitHeaderException::class);
        $this->expectExceptionMessage('The header RateLimit-Interval is missing');
        new Response(self::STATUS_CODE, $headers, self::BODY);
    }

    public function testMissingRateLimitRemainingHeaderThrowsException(): void
    {
        $headers = $this->createWorkingHeaders();
        unset($headers['RateLimit-Remaining']);

        $this->expectException(MissingRateLimitHeaderException::class);
        $this->expectExceptionMessage('The header RateLimit-Remaining is missing');
        new Response(self::STATUS_CODE, $headers, self::BODY);
    }

    public function testMissingRateLimitResetHeaderThrowsException(): void
    {
        $headers = $this->createWorkingHeaders();
        unset($headers['RateLimit-Reset']);

        $this->expectException(MissingRateLimitHeaderException::class);
        $this->expectExceptionMessage('The header RateLimit-Reset is missing');
        new Response(self::STATUS_CODE, $headers, self::BODY);
    }

    private function createWorkingResponseObject(string $body = self::BODY): Response
    {
        return new Response(
            self::STATUS_CODE,
            $this->createWorkingHeaders(),
            $body
        );
    }

    private function createWorkingHeaders(): array
    {
        return [
            'RateLimit-Limit' => [(string) self::RATE_LIMIT_LIMIT_VALUE],
            'RateLimit-Interval' => [(string) self::RATE_LIMIT_INTERVAL_VALUE],
            'RateLimit-Remaining' => [(string) self::RATE_LIMIT_REMAINING_VALUE],
            'RateLimit-Reset' => [(string) self::RATE_LIMIT_RESET_VALUE],
        ];
    }
}
