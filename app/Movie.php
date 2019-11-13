<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actor; 
use App\Producer; 

class Movie extends Model
{
    protected $fillable = ['name', 'year_of_release', 'plot', 'image'];

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
 
    public function producers()
    {
    	return $this->belongsTo('App\Producer');
    }
}
