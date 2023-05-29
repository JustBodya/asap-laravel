@extends('admin.layouts.layout')

@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form class="" method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Title
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="title" autofocus="autofocus">
            </div>
            <button class="mt-10 p-3 bg-blue-600 rounded-md hover:bg-blue-400" type="submit">Создать</button>
        </form>
    </div>
@endsection
