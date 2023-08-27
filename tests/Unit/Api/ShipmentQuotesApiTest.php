<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\ShipmentQuotesApi;
use DjThossi\ShipcloudSdk\Http\Client;

class ShipmentQuotesApiTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('post')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new ShipmentQuotesApi($clientMock);
        $response = $api->create([
            'key' => 'value',
        ]);
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }
}
