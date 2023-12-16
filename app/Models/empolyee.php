<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empolyee extends Model
{
    protected $guarded =[];

    function branch()
    {
        // return $this->hasMany(Order::class);
        return $this->hasOne( 'App\Models\branch', 'id', 'branch_id' );
    }
    function depant()
    {
        // return $this->hasMany(Order::class);
        return $this->hasOne( 'App\Models\depant', 'id', 'depant_id' );//id คือฟิลของตารางที่จะโยงไป , คีย์ที่จะโยงไป
    }
}
