<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    protected $fillable = ['car_name', 'year', 'license_plat', 'price', 'type', 'brand_id', 'available'];
    protected $primaryKey = 'car_id';
}
