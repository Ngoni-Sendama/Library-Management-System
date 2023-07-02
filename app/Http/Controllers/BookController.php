<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::orderBy('title', 'asc')->get();
        return view('admin.book.index', compact('book'));
    }
    public function create()
    {
        return view('admin.book.create');
    }
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', compact('book'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'required|image',
            'publication_date' => 'required|date',
            'stock' => 'required|integer',
        ]);
    
        // Handle the image upload
        $imagePath = $request->file('image')->store('images', 'public');
    
        // Create a new book instance
        $book = new Book();
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->isbn = $validatedData['isbn'];
        $book->description = $validatedData['description'];
        $book->genre = $validatedData['genre'];
        $book->image = $imagePath;
        $book->publication_date = $validatedData['publication_date'];
        $book->stock = $validatedData['stock'];
        $book->save();
    
        // Redirect to a success page or perform other actions
        return redirect()->back()->with('success', 'Book created successfully');
    }
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'required|image',
            'publication_date' => 'required|date',
            'stock' => 'required|integer',
        ]);
    
        $book = Book::findOrFail($id); // Find the book by ID
    
        // Handle the image upload
            $imagePath = $request->file('image')->store('images', 'public');
       
    
        // Update the book attributes     
        $book->image = $imagePath;
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->isbn = $validatedData['isbn'];
        $book->description = $validatedData['description'];
        $book->genre = $validatedData['genre'];
        $book->publication_date = $validatedData['publication_date'];
        $book->stock = $validatedData['stock'];
    
        $book->save();
    
        return redirect()->route('books')->with('success', 'Book updated successfully');
    }
    

public function destroy($id)
{
        // Find the book record by ID
        $book = Book::find($id);
        if (!$book) {
        // Return a 404 error if the book record is not found
        return response()->json(['message' => 'book not found.'], 404);
        }
        // Delete the book record from the database
        $book->delete();
        // Redirect the user to a success page
        return back()->with('success', 'book deleted successfully');
}  
public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $Sbooks = Book::where('title', 'like', '%' . $searchTerm . '%')
        ->orWhere('author', 'like', '%' . $searchTerm . '%')
        ->get();

    if ($Sbooks->isEmpty()) {
        $errorMessage = "Book not available";
    } else {
        $errorMessage = null;
    }

    return view('search_results', compact('Sbooks', 'errorMessage'));
}
public function show($id)
{
    $book = Book::find($id);
    return view('admin.book.show', compact('book'));
}

}
