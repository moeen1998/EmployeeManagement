<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'departement_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'birthdate',
        'date_hired',
    ];
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
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
