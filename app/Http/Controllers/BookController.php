<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'book/images/';
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileimage);
            $input['image'] = "$profileimage";
        }

        Book::create($input);

        return redirect()->route('bo.index')->with('success', 'Book Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            // Delete the old image if it exists
            if (File::exists(public_path('book/images/' . $book->image))) {
                File::delete(public_path('book/images/' . $book->image));
            }
            $destinationPath = 'book/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $book->update($input);

        return redirect()->route('bo.index')
            ->with('success', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        // Delete the product image from storage if it exists
        if (File::exists(public_path('book/images/' . $book->image))) {
            File::delete(public_path('book/images/' . $book->image));
        }
        $book->delete();
        return redirect()->route('bo.index')->with('success', 'Book Deleted Successfully');
    }
}
