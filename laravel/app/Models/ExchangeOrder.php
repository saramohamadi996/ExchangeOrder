<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeOrder extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'source_currency', 'target_currency', 'amount', 'tracking_code'];

}
