<?php

namespace SoftAndTech\Contactus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    protected $guarded = [];
    protected $fillable = ['name', 'email', 'u_phone', 'message'];
}
