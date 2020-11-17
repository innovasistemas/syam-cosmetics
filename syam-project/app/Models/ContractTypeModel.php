<?php namespace App\Models;

use CodeIgniter\Model;

class ContractTypeModel extends Model
{
    protected $table      = 'contract_type';
    protected $primaryKey = 'id';

    protected $allowedFields = ['description', 'observation', 'active'];
}
