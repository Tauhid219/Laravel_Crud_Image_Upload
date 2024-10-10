@extends('books.layout')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">

        {{-- Success Message --}}
        @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Book List</h2>
            <a href="{{ route('bo.create') }}" class="text-blue-500 hover:text-blue-700 ml-4 font-bold">
                Add Book
            </a>
        </div>

        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $book->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->author }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><img
                                src="/book/images/{{ $book->image }}" width="100px" alt="Book Image"></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <form action="{{ route('bo.destroy', $book->id) }}" method="POST">
                                <a href="{{ route('bo.edit', $book->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- More rows -->
            </tbody>
        </table>
    </div>
@endsection
