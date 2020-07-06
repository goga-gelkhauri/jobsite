<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'title', 'description','salary','location','company_id'
    ];

    public function Cateogry()
    {
        return $this->belongsTo('App\Category');
    }

    public function Company()
    {
        return $this->belongsTo('App\Company');
    }
}
