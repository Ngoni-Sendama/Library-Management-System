<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'date_of_birth', 'address', 'phone'];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
