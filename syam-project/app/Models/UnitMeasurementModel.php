<?php namespace App\Models;

use CodeIgniter\Model;

class UnitMeasurementModel extends Model
{
    protected $table      = 'unit_measurement';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'active'
                            ];
}
