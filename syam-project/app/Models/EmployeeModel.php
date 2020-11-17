<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table      = 'employee';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'certificate', 'number_children', 'active'
                            ];
}
