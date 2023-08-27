<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\ShipmentQuotesApi;
use DjThossi\ShipcloudSdk\Http\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ShipmentQuotesApiTest extends TestCase
{
    public function testCreate(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('post')
            ->willReturn(new Response(200, [], '{"foo": "bar"}'));

        $api = new ShipmentQuotesApi($clientMock);
        $result = $api->create([
            'key' => 'value',
        ]);
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals(['foo' => 'bar'], $result);
    }
}
