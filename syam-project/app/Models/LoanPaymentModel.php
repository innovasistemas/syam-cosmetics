<?php namespace App\Models;

use CodeIgniter\Model;

class LoanPaymentModel extends Model
{
    protected $table      = 'loan_payment';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'payment_date', 'value', 'active'
                            ];
}
