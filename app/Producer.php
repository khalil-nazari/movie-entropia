<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Producer extends Model
{
    public $myname = "khalil";
    protected $fillable = ['name', 'sex', 'dob', 'bio'];

    public function movies()
    {
    	return $this->hasMany('App\Movie');
    }
}
