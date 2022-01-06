<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $id;
    protected $name;
    protected $price;
    protected $urlImage;
    protected $state;
    protected $id_prcategory;
}
