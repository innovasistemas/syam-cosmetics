<?php namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table      = 'permission';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'profile_id', 'component_id', 'active'
                            ];
}
