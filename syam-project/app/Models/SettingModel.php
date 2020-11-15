<?php namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    // protected $DBGroup = 'syamlab';

    protected $table      = 'department';
    protected $primaryKey = 'id';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['code', 'name', 'country_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $createdField  = 'creation_date';
    // protected $updatedField  = 'updated_at';
    // protected $updatedField  = 'last_update';
    // protected $deletedField  = 'deleted_at';
    // protected $validationRules    = [];
    // protected $validationMessages = [];

    // protected $validationRules    = [
    //     'description'     => 'required|alpha_numeric_space|min_length[3]|
    //                         is_unique[profile.description]',
    // ];
    //
    // protected $validationMessages = [
    //     'description'        => [
    //         'required' => 'Debe ingresar una descripción para el perfil',
    //         'is_unique' => 'La descripción ingresada ya existe'
    //     ]
    // ];

    // protected $skipValidation     = false;


    public function test()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM department');
        return $query->getResult();
    }
}
