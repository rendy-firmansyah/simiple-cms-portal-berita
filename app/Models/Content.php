<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    public $table = 'contents';

    public $fillable = ['headline', 'date_created', 'upload_image', 'news_content', 'categories_id'];

    public function categories() {
        return $this->belongsTo(Categories::class);
    }
}
