<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWakiModel extends Model
{
    protected $table = 'user_waki';
    protected $primarykey = 'id';
    protected $fillable = ['name','email'];
}
