@extends('admin.layouts.layout')

@section('content')
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form method="post" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Title
                </label>
                <input
                    value="{{ old('title', $post->title) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="title" autofocus="autofocus">

            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Content
                </label>
                <input
                    value="{{ old('content', $post->content) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="content" autofocus="autofocus">
            </div>
            <select name="category_id" id="category"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                @foreach($category_title as $category)
                    <option @if($post->category_id === $category->id) selected
                            @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Автор
                </label>
                <input
                    disabled
                    value="{{$post->user->name}}"
                    class="bg-gray-300 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="user_id" required="required" autofocus="autofocus">
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="published_at">
                    Дата публикации
                </label>
                <input
                    value="{{ old('published_at', $post->published_at) }}"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="published_at" type="text" name="published_at" required="required" autofocus="autofocus">
            </div>
            @if($post->image)
                <div>
                    <label for="current_image">Картинка</label>
                    <img id="current_image" src="{{asset('storage/uploads/' . $post->image)}}" height="300"
                         class="w-full"
                         alt="{{$post->image}}">
                </div>
                <div class="mb-3">
                    <label
                        for="image"
                        class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    >Изменить картинку</label
                    >
                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                        type="file"
                        name="image"
                        id="image"/>
                </div>
            @else
                <div class="mb-3">
                    <label
                        for="image"
                        class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                    >Загрузить картинку</label
                    >
                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                        type="file"
                        name="image"
                        id="image"/>
                </div>
            @endif
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Отображать?
                </label>
                <input
                    hidden
                    value="0" name="is_visible">
                <input
                    @checked(old('is_visible', $post->is_visible))
                    value="1"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1"
                    id="published_at" type="checkbox" name="is_visible" autofocus="autofocus">
            </div>

            <button class="mt-10 p-3 bg-blue-600 rounded-md hover:bg-blue-400" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
