<?php namespace App\Models;

use CodeIgniter\Model;

class ParameterModel extends Model
{
    protected $table      = 'parameter';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'code', 'description', 'value',
                                'percentage', 'parameter_category_id', 'active'
                            ];
}
