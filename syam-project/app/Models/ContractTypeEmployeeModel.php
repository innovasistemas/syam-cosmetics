<?php namespace App\Models;

use CodeIgniter\Model;

class ContractTypeEmployeeModel extends Model
{
    protected $table      = 'contract_type_employee';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'employee_id', 'contract_type_id', 
                                'date_admission', 'finish_date', 'position',
                                'salary', 'observation', 'peace_and_safe', 
                                'active'
                            ];
}
