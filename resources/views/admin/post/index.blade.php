@extends('admin.layouts.layout')
@section('content')
    <div class="flex items-center justify-between text-green-500 font-bold content-around">
        <h2 class="text-3xl text-gray-500">Статьи</h2>
        <div class="flex flex-col">
            <a href="{{ route('admin.posts.create') }}">Создать статью</a>

            <form action="{{route('admin.posts.destroyAll')}}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-red-500">Удалить все статьи</button>
            </form>
        </div>
    </div>
    <div class="w-2/5">
        <form action="{{route('admin.posts.index')}}" method="get" class="flex justify-between items-baseline">
            <select name="category_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                <option selected disabled value>Все категории</option>
                @foreach($categories as $category)
                    <option
                        @selected(old('category_id', request()->get('category_id')) == $category->id) value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <select name="user_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1">
                <option selected disabled value>Все пользователи</option>
                @foreach($users as $user)
                    <option
                        value="{{$user->id}}" @selected(old('user_id', request()->get('user_id')) == $user->id) >{{$user->name}}</option>
                @endforeach
            </select>
            <button
                type="submit"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-md">
                Фильтр
            </button>
        </form>
    </div>
    <div class="flex content-around flex-wrap">
        @foreach($posts as $post)
            <div class="m-3 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden">
                <h3 class="font-bold">{{ $post->title }}</h3>
                <p>Описание: {{ $post->content }}</p>
                <p>Категория: {{$post->category->title}}</p>
                <p>Автор статьи: {{$post->user->name}}</p>
                <span>Дата публикации: {{ $post->published_at }}</span>
                @if($post->image)
                    <img src="{{asset('storage/uploads/' . $post->image)}}" alt="{{$post->image}}">
                @endif
                <br><a class="text-indigo-500 hover:text-indigo-700 hover:border-b bord er-indigo-700"
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
    <br><br>
    {{$posts->links()}}
@endsection
