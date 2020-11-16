<?php namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table      = 'loan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'disbursement_date',
                                'pay_limit_date', 'amount', 'balance',
                                'payments_quantity', 'active'
                            ];
}
