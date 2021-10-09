<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $fillable = [
        'ci',
        'name',
        'phone'
    ];
    public function quotes()
    {
        return $this->hasMany('App/Models/Quote');
    }
}
