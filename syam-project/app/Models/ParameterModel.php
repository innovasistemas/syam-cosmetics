<?php namespace App\Models;

use CodeIgniter\Model;

class ParameterModel extends Model
{
    protected $table      = 'parameter';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'code', 'description', 'value',
                                'percentage', 'parameter_category_id', 'active'
                            ];


    // Función para devolver el nombre de la tabla a partir de su código
    public function getTableName($code)
    {
        $arrayResult = $this->getWhere(['code' => $code])
                            ->getResult();

        $strCodeCountry = $arrayResult[0]->description;
        return $strCodeCountry;
    }
}
