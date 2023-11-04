<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='tbl_category';

    protected $fillable =[
        'category_name',
        'category_image',
        'category_des',
        'category_content',
        'category_status',
        'category_level',
        'category_slug',
        'category_tags',
    ];

    protected $primary_key = 'id';

    protected $hidden = [
        '_token',
    ];
}
