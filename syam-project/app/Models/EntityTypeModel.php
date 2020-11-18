<?php namespace App\Models;

use CodeIgniter\Model;

class EntityTypeModel extends Model
{
    protected $table      = 'entity_type';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'description', 'active'
    ];
}
