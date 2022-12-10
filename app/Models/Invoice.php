<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function official_receipt()
    {
        return $this->hasMany(OfficialReceipt::class, 'invoice_id');
    }
}
