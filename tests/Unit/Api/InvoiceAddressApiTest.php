<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\InvoiceAddressApi;
use DjThossi\ShipcloudSdk\Http\Client;

class InvoiceAddressApiTest extends ApiTestCase
{
    public function testShow(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new InvoiceAddressApi($clientMock);
        $response = $api->show();
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }
}
