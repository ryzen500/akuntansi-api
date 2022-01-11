<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =['title','amount','time','type','foto'.'country_id','state_id','city_id','images'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
