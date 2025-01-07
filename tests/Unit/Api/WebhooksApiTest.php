<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\WebhooksApi;
use DjThossi\ShipcloudSdk\Http\Client;

class WebhooksApiTest extends ApiTestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('execute')
            ->with('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new WebhooksApi($clientMock);
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

        $api = new WebhooksApi($clientMock);
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

        $api = new WebhooksApi($clientMock);
        $response = $api->create([
            'key' => 'value',
        ]);
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }

    public function testDelete(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('execute')
            ->with('delete')
            ->willReturn($this->createResponseMock(204));

        $api = new WebhooksApi($clientMock);
        $response = $api->remove('a5c2...');
        $this->assertTrue($response->wasSuccessful());
    }
}
