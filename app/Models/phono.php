<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phono extends Model
{
    //



    protected $table='phono';
    protected  $fillable =['code','phono','user_id'];
    protected $hidden=['user_id'];
    public  $timestamps = false;



    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
