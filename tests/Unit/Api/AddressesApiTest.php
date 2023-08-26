<?php

declare(strict_types=1);

namespace DjThossi\ShipcloudSdk\Tests\Unit\Api;

use DjThossi\ShipcloudSdk\Api\AddressesApi;
use DjThossi\ShipcloudSdk\Http\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class AddressesApiTest extends TestCase
{
    public function testAll(): void
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->expects($this->once())
            ->method('get')
            ->willReturn(new Response(200, [], '{"foo": "bar"}'));

        $api = new AddressesApi($clientMock);
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

        $api = new AddressesApi($clientMock);
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

        $api = new AddressesApi($clientMock);
        $result = $api->create([
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
        ]);
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals(['foo' => 'bar'], $result);
    }
}
