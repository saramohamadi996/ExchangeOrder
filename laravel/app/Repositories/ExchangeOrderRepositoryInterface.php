<?php

namespace App\Repositories;

interface ExchangeOrderRepositoryInterface
{
    public function create(array $data);

    public function findByTrackingCode($tracking_code);
}
