<?php
namespace App\Models;              // <- must match the path app/Models
use Illuminate\Database\Eloquent\Model;

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