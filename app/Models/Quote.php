<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $table = "quotes";
    protected $fillable = [
        'user_id',
        'client_id',
        'treatment_id',
        'date',
        'time',
        'state'
    ];
    public function user()
    {
        return $this->belongsTo('App/Models/User');
    }
    public function client()
    {
        return $this->belongsTo('App/Models/Client');
    }
    public function treatment()
    {
        return $this->belongsTo('App/Models/Treatment');
    }
}
