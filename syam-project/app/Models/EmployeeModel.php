<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table      = 'employee';
    protected $primaryKey = 'id';

    protected $allowedFields = [
<<<<<<< HEAD
                                'date_admision', 'position', 'certificate',
                                'salary', 'number_children', 'pension_fund',
                                'EPS', 'ARL', 'compensation_box',
                                'bank_account', 'bank_entity', 'observation',
                                 'active'
=======
                                'certificate', 'number_children', 'active'
>>>>>>> d75ef44... Nuevas tablas, modelos. Consumo de datos: listado general
                            ];
}
