<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id')->with('invoice_detail');
    }

    public function officialReceipt()
    {
        return $this->belongsTo(OfficialReceipt::class, 'official_receipt_id');
    }

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class, 'medical_id')->with('service');
    }
}
