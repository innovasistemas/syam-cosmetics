<?php namespace App\Models;

use CodeIgniter\Model;

class ServiceEntityModel extends Model
{
    protected $table      = 'service_entity';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'identification_card', 
                                'address', 'phone', 'email', 'observation',
                                'active', 'entity_type_id'
                            ];
}