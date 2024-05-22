<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'countryOfBirth',
        'comment',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}
