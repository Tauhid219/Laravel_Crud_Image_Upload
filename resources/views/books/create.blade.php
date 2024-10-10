@extends('books.layout')

@section('content')
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Book Form</h2>
            <a href="{{ route('bo.index') }}" class="text-blue-500 hover:text-blue-700 ml-4 font-bold">
                Book List
            </a>
        </div>
        <form action="{{ route('bo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Enter Book Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" id="author" name="author"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Enter Author Name">
                @error('author')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fileUpload" class="block text-sm font-medium text-gray-700 mb-1">Choose Book Image</label>
                <input type="file" id="fileUpload" name="image"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('image')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Image Preview Section -->
            <div class="mb-4">
                <img id="imagePreview" class="hidden w-2/5 max-w-xs h-auto rounded-md" width="" src="#"
                    alt="Image Preview">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Submit</button>
            </div>
        </form>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        document.getElementById('fileUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
