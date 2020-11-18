<?php namespace App\Models;

use CodeIgniter\Model;

class LoanStatusModel extends Model
{
    protected $table      = 'loan_status';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'active'
                            ];
}