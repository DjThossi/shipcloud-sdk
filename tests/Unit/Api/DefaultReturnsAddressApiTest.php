<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\DefaultReturnsAddressApi;
use DjThossi\ShipcloudSdk\Http\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class DefaultReturnsAddressApiTest extends TestCase
{
    public function testShow(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn(new Response(200, [], '{"foo": "bar"}'));

        $api = new DefaultReturnsAddressApi($clientMock);
        $result = $api->show();
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals(['foo' => 'bar'], $result);
    }
}
