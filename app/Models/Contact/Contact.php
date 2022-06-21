<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'contacts';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message'
    ];
}
