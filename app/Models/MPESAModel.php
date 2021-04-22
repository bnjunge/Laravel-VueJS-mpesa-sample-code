<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mpesaModel extends Model
{
    use HasFactory;
    
    protected $table = 'mpesa_c2b_confirmed_payments';
}
