<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\MeApi;
use DjThossi\ShipcloudSdk\Http\Client;

class MeApiTest extends ApiTestCase
{
    public function testShow(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn($this->createResponseMock(200, [], '{"foo": "bar"}'));

        $api = new MeApi($clientMock);
        $response = $api->show();
        $this->assertEquals(['foo' => 'bar'], $response->getBodyAsArray());
    }
}
