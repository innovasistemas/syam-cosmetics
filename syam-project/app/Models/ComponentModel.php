<?php namespace App\Models;

use CodeIgniter\Model;

class ComponentModel extends Model
{
    protected $table      = 'component';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'order', 'link',
                                'image', 'active', 'type_component_id'
                            ];
}
