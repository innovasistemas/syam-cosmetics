<?php namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table      = 'purchase_order';
    protected $primaryKey = 'id';

    protected $allowedFields = [
                                'provider_id', 'date_time', 'total_cost', 
                                'total_IVA', 'total_withholding', 
                                'way_to_pay_id', 'payment_method_id', 
                                'currency_id', 'status', 'observation', 
                                'active' 
                            ];
}