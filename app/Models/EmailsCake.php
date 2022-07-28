<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailsCake extends Model
{
    protected $table = 'emails_cakes';
    protected $fillable = ['cake_id', 'email_id'];
}
