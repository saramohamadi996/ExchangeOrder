<?php

namespace App\Repositories;

use App\Models\ExchangeOrder;

class ExchangeOrderRepository implements ExchangeOrderRepositoryInterface
{
    public function create(array $data)
    {
        return ExchangeOrder::create($data);
    }

    public function findByTrackingCode($tracking_code)
    {
        return ExchangeOrder::where('tracking_code', $tracking_code)->firstOrFail();
    }
}
