<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $table = "treatments";
    protected $fillable = [
        'name',
        'cost',
        'description'
    ];
    public function quotes()
    {
        return $this->hasMany('App/Models/Quote');
    }
}
