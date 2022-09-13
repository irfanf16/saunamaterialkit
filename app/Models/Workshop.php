<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $fillable=['name','logo','address','contact_person','phone_no'];

    public function adminUser(){
       return $this->belongsToMany(User::class,'user_workshops','workshop_id','user_id','id');
    }
    public function users(){
       return $this->belongsToMany(User::class,'user_workshops','workshop_id','user_id','id');
    }
    public function services(){
       return $this->belongsToMany(Service::class,'workshop_services','workshop_id','service_id','id');
    }
    public function locations(){
       return $this->belongsToMany(Location::class,'workshop_locations','workshop_id','location_id','id');
    }
    public function products(){
        return $this->belongsToMany(Product::class,'workshop_products','workshop_id','product_id','id');
    }
}
