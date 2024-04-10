<?php

namespace App\Http\Controllers;

use App\Repositories\ExchangeOrderRepositoryInterface;
use App\Http\Requests\StoreExchangeOrderRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ExchangeOrderController extends Controller
{
    protected ExchangeOrderRepositoryInterface $exchange_order_repository;

    public function __construct(ExchangeOrderRepositoryInterface $exchange_order_repository)
    {
        $this->exchange_order_repository = $exchange_order_repository;
    }

    public function store(StoreExchangeOrderRequest $request)
    {
        $validated = $request->validated();
        $order = $this->exchange_order_repository->create($validated + ['tracking_code' => Str::random(10)]);
        return response()->json(['tracking_code' => $order->tracking_code], 201);
    }

    public function show($tracking_code)
    {
        $order = $this->exchange_order_repository->findByTrackingCode($tracking_code);
        return response()->json($order);
    }

}
