<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Chapter;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'yearOfPublication',
        'description',
        'cover',
        'author_id',
        'chapter_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
