<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['text','customer_id', 'procedure_id', 'start_date', 'end_date', 'color'];


    use HasFactory;
    public function Customer(){

        return $this->belongsTo(Customer::class);
    }
    
}
