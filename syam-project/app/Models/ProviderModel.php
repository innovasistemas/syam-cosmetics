<?php namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model
{
    protected $table      = 'provider';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'contact_name', 'contact_phone',
                                'contact_email', 'active'
                            ];
}
