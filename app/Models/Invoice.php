<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
     protected $table = 'invoices';
    //   protected $primaryKey = 'SNo';
     protected $fillable =   [
        'id',
        'invoice_number',
        'invoice_date',
        'invoice_amount',
        'invoice_image',
        'invoice_coverLetter_image',
        'status',
        'invoice_status',
        'all_invoices',
    ];
}
