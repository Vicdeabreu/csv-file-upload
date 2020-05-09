<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function deals(){
        return $this->hasMany('App\Deal');
    }

    protected $table = 'clients';
    protected $fillable = ['client_name', 'country'];
}
