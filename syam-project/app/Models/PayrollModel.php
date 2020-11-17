<?php namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model
{
    protected $table      = 'payroll';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'employee_id', 'expedition_date',
                                'period_caused_from', 'period_caused_to', 
                                'total_discounts', 'total_to_pay',
                                'observation', 'active'
                            ];
}
