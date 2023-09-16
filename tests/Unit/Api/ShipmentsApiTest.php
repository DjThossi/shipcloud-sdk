<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\ShipmentsApi;
use DjThossi\ShipcloudSdk\Http\Client;

class ShipmentsApiTest extends ApiTestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new ShipmentsApi($clientMock);
        $response = $api->all();
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }

    public function testFind(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new ShipmentsApi($clientMock);
        $response = $api->find('1234567');
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }

    public function testCreate(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('post')
            ->willReturn($this->createResponseMock(
                200,
                [],
                '{"id": "1", "carrier_tracking_no": "2", "carrier_tracking_url": "https://www.example.com/#1", "tracking_url": "https://www.example.com/#2", "label_url": "https://www.example.com/#3", "price": 0.0}'
            ));

        $api = new ShipmentsApi($clientMock);
        $response = $api->create([
            'id' => 'value',
        ]);
        $this->assertEquals(
            [
                'id' => '1',
                'carrier_tracking_no' => '2', 
                'carrier_tracking_url' => 'https://www.example.com/#1',
                'tracking_url' => 'https://www.example.com/#2',
                'label_url' => 'https://www.example.com/#3',
                'price' => 0.0,
            ],
            $response->getBodyAsArray()
        );
    }

    public function testDelete(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('delete')
            ->willReturn($this->createResponseMock(204));

        $api = new ShipmentsApi($clientMock);
        $response = $api->remove('a5c2...');
        $this->assertTrue($response->wasSuccessful());
    }
}
