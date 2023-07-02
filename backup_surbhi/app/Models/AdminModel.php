<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "admin";
    protected $fillable = ['admin_id','admin_username','admin_password']; 
    protected $primary_key = "admin_id";
}
