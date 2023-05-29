@extends('admin.layouts.layout')
@section('content')
    <div class="flex items-center justify-between text-green-500 font-bold content-around">
        <h2 class="text-3xl text-gray-500">Статьи</h2>
        <div class="flex flex-col">
            <a href="{{ route('admin.posts.create') }}">Создать статью</a>
        </div>
    </div>

    <div class="flex content-around">
        @foreach($posts as $post)
            <div class="m-3 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <p>{{$post->category()}}</p>
                <span>Дата публикации: {{ $post->published_at }}</span>
                <a class="text-indigo-500 hover:text-indigo-700 hover:border-b bord er-indigo-700"
                   href="{{ route('admin.posts.edit', $post) }}"> Редактировать </a>
                <br>
                <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>

@endsection
