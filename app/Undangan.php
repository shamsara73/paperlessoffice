<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    protected $fillable = [ 'id','creator','legalno','title','date','location','description','emailsent'];
  
}
