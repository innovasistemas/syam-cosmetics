<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeServiceEntityModel extends Model
{
    protected $table      = 'employee_service_entity';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'account_number', 'contract_type_employee_id',
                                'service_entity_id', 'observation', 'active'
                            ];
}
