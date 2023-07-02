<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "invoice_master";
    protected $fillable = ['invoice_master_id','master_date','bill_no','invoice_client_name','total_amount','invoice_client_address','trust_id']; 
    protected $primary_key = "invoice_master_id";
}
