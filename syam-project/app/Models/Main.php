<?php namespace App\Models;

use CodeIgniter\Model;

class Main extends Model
{
    // protected $DBGroup = 'syamlab';

    protected $table      = 'profile';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['description', 'active'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    protected $createdField  = 'creation_date';
    // protected $updatedField  = 'updated_at';
    protected $updatedField  = 'last_update';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'description'     => 'required|alpha_numeric_space|min_length[3]|
                            is_unique[profile.description]',
    ];

    protected $validationMessages = [
        'description'        => [
            'required' => 'Debe ingresar una descripción para el perfil',
            'is_unique' => 'La descripción ingresada ya existe'
        ]
    ];

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    protected $skipValidation     = false;





    public function find($id = NULL)
    {
        $profile = $this->find($profile_id);
    }


    public function findAll($limit = 0, $offset = 0)
    {
        // return $this->findAll();
        return "hola";
    }

    public function test()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM department');
        return $query->getResult();
    }
}
