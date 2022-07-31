<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vedio extends Model
{
    //
    protected $table='vedios';
    protected  $fillable =['name','viewer'];
    public  $timestamps = false;


}
