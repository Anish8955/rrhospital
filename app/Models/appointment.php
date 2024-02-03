<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
protected $fillable = ['name','phone','email','date','area', 'city','state','code'];

protected $table = 'appointment';
}
