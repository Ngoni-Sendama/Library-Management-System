<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function viewvisitor()
    {
        $visitor = Visitor::all();
        return view('admin.visitors.index', compact('visitor'));
    }
    public function create()
    {
        return view('admin.visitors.create');
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'date_of_birth' => 'required|date',
        'address' => 'required',
        'image' => 'required|image',
        'phone' => 'required',
    ]);

    // Handle the image upload
    $imagePath = $request->file('image')->store('imagesVisitor', 'public');

    $visitor = new Visitor();
    $visitor->name = $validatedData['name'];
    $visitor->email = $validatedData['email'];
    $visitor->date_of_birth = $validatedData['date_of_birth'];
    $visitor->phone = $validatedData['phone'];
    $visitor->address = $validatedData['address'];
    $visitor->image = $imagePath;
    $visitor->save();

    // Redirect to a success page or perform other actions
    return redirect()->back()->with('success', 'Visitor created successfully');
}
// public function destroy(Visitor $visitor)
// {
//     // Delete the visitor from the database
//     $visitor->delete();

//     // Redirect to the visitor index page or perform any other desired action
//     return redirect()->back()->with('success', 'Visitor deleted successfully');
// }
    public function destroy($id)
{
        // Find the Visitor record by ID
        $visitor = visitor::find($id);
        if (!$visitor) {
        // Return a 404 error if the Visitor record is not found
        return response()->json(['message' => 'Visitor not found.'], 404);
        }
        // Delete the Visitor record from the database
        $visitor->delete();
        // Redirect the user to a success page
        return back()->with('success', 'visitor deleted successfully');
}       

public function edit($id)
{
    $visitor = visitor::find($id);
    return view('admin.visitors.edit', compact('visitor'));
}
public function show($id)
{
    $visitor = visitor::find($id);
    return view('admin.visitors.show', compact('visitor'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'date_of_birth' => 'required|date',
        'address' => 'required',
        'image' => 'required|image',
        'phone' => 'required',
    ]);

    $visitor = Visitor::findOrFail($id); // Find the visitor by ID
    $imagePath = $request->file('image')->store('images', 'public');
    $visitor->name = $request->input('name');
$visitor->email = $request->input('email');
$visitor->date_of_birth = $request->input('date_of_birth');
$visitor->address = $request->input('address');
$visitor->phone = $request->input('phone');
$visitor->image = $imagePath; // Assuming 'image' is the column name in your visitors table for storing the image path
$visitor->save();

 

    return redirect()->route('visitors')->with('success', 'Visitor updated successfully');
}

}
