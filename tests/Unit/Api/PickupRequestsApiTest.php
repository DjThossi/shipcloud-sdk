<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\PickupRequestsApi;
use DjThossi\ShipcloudSdk\Http\Client;

class PickupRequestsApiTest extends ApiTestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('execute')
            ->with('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new PickupRequestsApi($clientMock);
        $response = $api->all();
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }

    public function testFind(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('execute')
            ->with('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new PickupRequestsApi($clientMock);
        $response = $api->find('1234567');
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }

    public function testCreate(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('execute')
            ->with('post')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new PickupRequestsApi($clientMock);
        $response = $api->create([
            'key' => 'value',
        ]);
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }
}
