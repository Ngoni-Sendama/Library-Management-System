<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Visitor;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::paginate(8);
        return view('welcome', compact('books'));
    }
    public function dashboard()
    {
        $bookCount = Book::count();
        $visitorCount = Visitor::count();
        $borrowingsWithoutReturnDateCount = Borrowing::whereNull('return_date')->count();
        $borrowingsWithReturnDateCount = Borrowing::whereNotNull('return_date')->count();
    
        return view('dashboard', [
            'bookCount' => $bookCount,
            'visitorCount' => $visitorCount,
            'borrowingsWithoutReturnDateCount' => $borrowingsWithoutReturnDateCount,
            'borrowingsWithReturnDateCount' => $borrowingsWithReturnDateCount,
        ]);
    }
    
}
