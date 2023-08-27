<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

abstract class ApiTestCase extends TestCase
{
    protected const RATE_LIMIT_LIMIT_VALUE = '120';
    protected const RATE_LIMIT_INTERVAL_VALUE = '60';
    protected const RATE_LIMIT_REMAINING_VALUE = '111';
    protected const RATE_LIMIT_RESET_VALUE = '42';

    protected function createResponseMock(int $statusCode = 200, array $headers = [], string $body = ''): Response
    {
        if (!isset($headers['RateLimit-Limit'][0])) {
            $headers['RateLimit-Limit'][0] = self::RATE_LIMIT_LIMIT_VALUE;
        }

        if (!isset($headers['RateLimit-Interval'][0])) {
            $headers['RateLimit-Interval'][0] = self::RATE_LIMIT_INTERVAL_VALUE;
        }

        if (!isset($headers['RateLimit-Remaining'][0])) {
            $headers['RateLimit-Remaining'][0] = self::RATE_LIMIT_REMAINING_VALUE;
        }

        if (!isset($headers['RateLimit-Reset'][0])) {
            $headers['RateLimit-Reset'][0] = self::RATE_LIMIT_RESET_VALUE;
        }

        return new Response($statusCode, $headers, $body);
    }
}
