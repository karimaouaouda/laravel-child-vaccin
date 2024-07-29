<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\ChildObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([ChildObserver::class])]
class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'first_name',
        'last_name',
        'adopted',
        'date_of_birth',
    ];


    protected $dates = [
        'vaccin_date'
    ];

    public function getFullNameAttribute(){
        return $this->first_name . " " . $this->last_name;
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function vaccins(){
        return $this->belongsToMany(
            Vaccin::class,
            'vaccin_appointments',
        )->withPivot([
            'vaccin_date',
            'with_appointment'
        ]);
    }
}
