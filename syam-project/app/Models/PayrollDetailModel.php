<?php namespace App\Models;

use CodeIgniter\Model;

class PayrollDetailModel extends Model
{
    protected $table      = 'payroll_detail';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'description', 'daytime_hours', 'night_hours',
                                'overtime_hours', 'overtime_night_hours', 
                                'daytime_festive_hours', 'night_festive_hours',
                                'daytime_festive_overtime_hours', 
                                'night_festive_overtime_hours', 
                                'transportation_assistence', 
                                'discount_products', 'discount_food', 
                                'discount_loan', 'discount_others', 
                                'commission', 'payroll_id'
                            ];
}
