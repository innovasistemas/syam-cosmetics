<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeDocumentModel extends Model
{
    protected $table      = 'employee_document';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'observation', 'image',
                                'active'
                            ];
}
