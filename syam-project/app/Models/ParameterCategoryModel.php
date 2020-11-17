<?php namespace App\Models;

use CodeIgniter\Model;

class ParameterCategoryModel extends Model
{
    protected $table      = 'parameterCategory';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'apply', 'active'
                            ];
}
