<?php namespace App\Models;

use CodeIgniter\Model;

class ExchangeRateModel extends Model
{
    protected $table      = 'exchange_rate';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'exchange_TRM', 'custom_exchange', 'active'
                            ];
}
