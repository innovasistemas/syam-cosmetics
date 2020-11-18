<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'code', 'description', 'existence', 
                                'stock_minimun', 'stock_maximun', 
                                'purchase_price', 'sale_price', 'order', 
                                'weight', 'way_to_pay_id', 'payment_method_id', 
                                'unit_measurement_id', 'observation', 'active' 
                            ];
}