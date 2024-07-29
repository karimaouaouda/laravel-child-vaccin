<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccin extends Model
{
    use HasFactory;


    protected  $fillable = [
        'name',
        'description',
        'age',
    ];


    public function children(){
        return $this->belongsToMany(
            Child::class,
            'vaccin_appointments',
        )->withPivot([
            'vaccin_date',
            'with_appointment'
        ]);
    }
}
