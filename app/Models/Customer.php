<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $fillable = ['name','email', 'address', 'telephone', 'created_at'];

    use SoftDeletes;

    public function Event(){
        return $this->hasMany(Event::class);
    }
}
