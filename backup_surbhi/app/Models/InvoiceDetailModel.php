<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetailModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "invoice_master_detail";
    protected $fillable = ['detail_id','invoice_master_id','pancard_no','splitBill_no', 'date', 'donor_address', 'amount_in_words', 'building_funds', 'youth_activities', 'cultural_programs', 'social_awareness','medical_aid','payment_method','cheque_number','cheque_date','drawn_on','cheque_amount','cash_amount'];
    protected $primary_key = "detail_id";
}