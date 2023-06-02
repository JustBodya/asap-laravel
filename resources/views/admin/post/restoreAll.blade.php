@extends('admin.layouts.layout')
@section('content')
    <div class="flex items-center justify-between text-green-500 font-bold content-around">
        <h2 class="text-3xl text-gray-500">Статьи</h2>
        <div class="flex flex-col">
            <form action="{{ route('admin.posts.restoreAll') }}" method="post">
                @csrf
                @method('PUT')
                <button class="text-green-500">Восстановить все записи</button>
            </form>
        </div>

    </div>

    <div class="flex content-around">
        @foreach($posts as $post)
            <div class="m-3 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <p>{{$post->category()}}</p>
                <span>Дата публикации: {{ $post->published_at }}</span>

                <form action="{{route('admin.posts.restoreOne', $post->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="text-green-500">Восстановить</button>
                </form>
            </div>
        @endforeach
    </div>

@endsection
