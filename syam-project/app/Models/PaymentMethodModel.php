<?php namespace App\Models;

use CodeIgniter\Model;

class PaymentMethodModel extends Model
{
    protected $table      = 'payment_method';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'observation', 'active'
                            ];
}
