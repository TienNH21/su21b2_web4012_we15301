<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Chỉ định tên table trong trường hợp không đặt theo quy tắc của Eloquent
    protected $table = 'products';

    // Mặc định, Eloquent coi primary key là cột id
    protected $primaryKey = 'id';
}
