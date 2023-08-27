<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\PickupRequestsApi;
use DjThossi\ShipcloudSdk\Http\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class PickupRequestsApiTest extends TestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn(new Response(200, [], '{"foo": "bar"}'));

        $api = new PickupRequestsApi($clientMock);
        $result = $api->all();
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals(['foo' => 'bar'], $result);
    }

    public function testFind(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn(new Response(200, [], '{"foo": "bar"}'));

        $api = new PickupRequestsApi($clientMock);
        $result = $api->find('1234567');
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals(['foo' => 'bar'], $result);
    }

    public function testCreate(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('post')
            ->willReturn(new Response(200, [], '{"foo": "bar"}'));

        $api = new PickupRequestsApi($clientMock);
        $result = $api->create([
            'key' => 'value',
        ]);
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals(['foo' => 'bar'], $result);
    }
}
