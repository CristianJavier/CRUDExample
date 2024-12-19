<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudExample extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['UUID', 'name', 'description','code', 'status']; 
}
