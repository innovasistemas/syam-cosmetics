<?php namespace App\Models;

use CodeIgniter\Model;

class SaleOrderModel extends Model
{
    protected $table      = 'sale_order';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'customer_id', 'date_time', 'total_cost', 
                                'total_IVA', 'total_withholding', 
                                'way_to_pay_id', 'payment_method_id', 
                                'currency_id', 'status', 'observation', 
                                'active', 'shipping_phone', 'shipping_address',
                                'country_id', 'department_id', 'city_id'
                            ];
}