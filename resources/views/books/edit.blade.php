@extends('books.layout')

@section('content')
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Book Information</h2>
        <form action="{{ route('bo.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ $book->name }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fileUpload" class="block text-sm font-medium text-gray-700 mb-1">Choose Image</label>
                <input type="file" id="fileUpload" name="image"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"><img
                    src="/book/images/{{ $book->image }}" width="100px" alt="Book Image">
                @error('image')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Update</button>
            </div>
        </form>
    </div>
@endsection
