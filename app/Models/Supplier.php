<?php

class Supplier extends Model
{
use HasFactory;

/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
    'name',
    'address',
    'phone',
    'email'
];
}

?>