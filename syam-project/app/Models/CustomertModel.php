<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'type', 'order', 'link',
                                'image', 'active'
                            ];
}
