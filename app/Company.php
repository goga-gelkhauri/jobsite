<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'indusry',
        'description',
        'location'
    ];


    public function Jobs()
    {
        return $this->hasMany('App\Job');
    }
}
