<?php

namespace Tests\Unit;

use App\Repositories\ExchangeOrderRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExchangeOrderTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_exchange_order()
    {
        $mockRepository = $this->createMock(ExchangeOrderRepositoryInterface::class);
        $mockRepository->expects($this->once())
            ->method('create')
            ->willReturn((object)[
                'tracking_code' => 'RANDOM1234',
            ]);

        $this->app->instance(ExchangeOrderRepositoryInterface::class, $mockRepository);

        $response = $this->postJson('/api/exchange-orders', [
            'email' => 'user@example.com',
            'source_currency' => 'layer',
            'target_currency' => 'bitcoin',
            'amount' => 1000.00,
        ]);

        $response->assertStatus(201)
            ->assertJson(['tracking_code' => 'RANDOM1234']);
    }
//    public function test_can_show_exchange_order()
//    {
//        $trackingCode = 'RANDOM1234';
//
//        $mockRepository = $this->createMock(ExchangeOrderRepositoryInterface::class);
//        $mockRepository->expects($this->once())
//            ->method('findByTrackingCode')
//            ->with($this->equalTo($trackingCode))
//            ->willReturn((object)[
//                'email' => 'user@example.com',
//                'source_currency' => 'layer',
//                'target_currency' => 'bitcoin',
//                'amount' => 1000.00,
//                'tracking_code' => $trackingCode,
//            ]);
//
//        $this->app->instance(ExchangeOrderRepositoryInterface::class, $mockRepository);
//
//        $response = $this->getJson("/api/exchange-orders/{$trackingCode}");
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'email' => 'user@example.com',
//                'source_currency' => 'layer',
//                'target_currency' => 'bitcoin',
//                'amount' => 1000.00,
//                'tracking_code' => $trackingCode,
//            ]);
//    }

}
