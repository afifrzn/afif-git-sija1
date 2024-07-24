<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);

        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());
        return response()->json($book);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
