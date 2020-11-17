<?php namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table      = 'person';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'identification_card', 'first_name', 
                                'last_name', 'address', 'phone', 
                                'email', 'type_person', 'birth_date', 
                                'sex', 'civil_status', 'birth_place', 
                                'city_residence', 'image', 'active' 
                            ];
}