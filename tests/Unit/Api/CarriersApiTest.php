<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\CarriersApi;
use DjThossi\ShipcloudSdk\Http\Client;

class CarriersApiTest extends ApiTestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new CarriersApi($clientMock);
        $response = $api->all();
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }
}
