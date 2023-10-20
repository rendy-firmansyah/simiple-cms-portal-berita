<?php

namespace App\Models;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    public $table = 'categories';

    public $fillable = [
        'name',
    ];

    public function content() {
        return $this->hasMany(Content::class);
    }
}
