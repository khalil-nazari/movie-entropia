<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie; 

class Actor extends Model
{
    protected $fillable = ['name', 'sex', 'dob', 'bio'];

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
