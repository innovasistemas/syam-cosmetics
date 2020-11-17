<?php namespace App\Models;

use CodeIgniter\Model;

class SaleDetailModel extends Model
{
    protected $table      = 'saleDetail';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'product_id', 'quantity',
                                'price', 'sale_order_id'
                            ];
}
