<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id', 'book_id', 'borrowing_date', 'return_date'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
