<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Http\Client;

class AddressesApiTest extends ApiTestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('execute')
            ->with('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new AddressesApi($clientMock);
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

        $api = new AddressesApi($clientMock);
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

        $api = new AddressesApi($clientMock);
        $response = $api->create([
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
        ]);
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }
}
