<?php namespace App\Models;

use CodeIgniter\Model;

class WayToPayModel extends Model
{
    protected $table      = 'way_to_pay';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'observation'
                            ];
}
