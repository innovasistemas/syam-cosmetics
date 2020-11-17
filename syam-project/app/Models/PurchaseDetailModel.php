<?php namespace App\Models;

use CodeIgniter\Model;

class PurchaseDetailModel extends Model
{
    protected $table      = 'purchaseDetail';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'product_id', 'quantity',
                                'price', 'purchase_order_id'
                            ];
}
