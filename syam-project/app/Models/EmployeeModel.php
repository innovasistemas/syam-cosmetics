<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table      = 'employee';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'date_admision', 'position', 'certificate',
                                'salary', 'number_children', 'pension_fund',
                                'EPS', 'ARL', 'compensation_box',
                                'bank_account', 'bank_entity', 'observation',
                                 'active'
                            ];
}
