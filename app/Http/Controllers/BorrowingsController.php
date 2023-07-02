<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Visitor;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingsController extends Controller
{
    public function viewborrowings()
    {
        $borrowings = Borrowing::with('visitor', 'book')->get();
         return view('admin.borrowings.index', ['borrowings' => $borrowings]);
    }
    public function createborrowing()
    {
        $visitors = Visitor::all();
        $books = Book::all();
        return view('admin.borrowings.create' ,compact('visitors', 'books'));
    }
    public function store(Request $request)
{
    $request->validate([
        'visitor_id' => 'required',
        'book_id' => 'required',
        'borrowing_date' => 'required|date',
    ]);

    // Create a new borrowing record
    $borrowing = new Borrowing();
    $borrowing->visitor_id = $request->input('visitor_id');
    $borrowing->book_id = $request->input('book_id');
    $borrowing->borrowing_date = $request->input('borrowing_date');
    $borrowing->save();

    // Perform any additional actions or logic

    return redirect()->route('borrowings')->with('success', 'Borrowing data stored successfully');
}
public function destroy($id)
{
        // Find the borrowing record by ID
        $borrowing = Borrowing::find($id);
        if (!$borrowing) {
        // Return a 404 error if the borrowing record is not found
        return response()->json(['message' => 'borrowing not found.'], 404);
        }
        // Delete the borrowing record from the database
        $borrowing->delete();
        // Redirect the user to a success page
        return back()->with('success', 'borrowing deleted successfully');
} 
public function edit($id)
{
    $borrowing = Borrowing::find($id);
    $book = Book::find($borrowing->book_id);
    $visitor = Visitor::find($borrowing->visitor_id);
    
    return view('admin.borrowings.edit', compact('borrowing', 'book', 'visitor'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'visitor_id' => 'required',
        'book_id' => 'required',
        'borrowing_date' => 'required|date',
        'return_date' => 'required|date',
    ]);

    $borrowing = Borrowing::findOrFail($id);

    $borrowing->visitor_id = $request->input('visitor_id');
    $borrowing->book_id = $request->input('book_id');
    $borrowing->borrowing_date = $request->input('borrowing_date');
    $borrowing->return_date = $request->input('return_date');

    $borrowing->save();

    // Perform any additional actions or logic

    return redirect()->route('borrowings')->with('success', 'Borrowing data updated successfully');
}




}
