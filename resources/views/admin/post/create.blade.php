@extends('admin.layouts.layout')

@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach($errors->all() as $error)
            <span class="text-red-300">{{ $error }} </span>
        @endforeach
        <form class="" method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Title
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="title" autofocus="autofocus">

            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Content
                </label>
                <textarea
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="name" type="text" name="content" autofocus="autofocus"></textarea>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="category">
                    Category
                </label>
                <select name="category_id" id="category"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    <option selected disabled value>Категории</option>
                    @foreach($category_title as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="user">
                    Автор
                </label>
                <select name="user_id" id="user"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    <option selected disabled value>Авторы</option>
                    @foreach($user_name as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="published_at">
                    Дата публикации
                </label>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    id="published_at" type="text" name="published_at" required="required" autofocus="autofocus">
            </div>
            <div class="mb-3">
                <label
                    for="image"
                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                >Картинка</label
                >
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file"
                    name="image"
                    id="image"/>
            </div>
            <div>
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Отображать?
                </label>
                <input
                    hidden
                    value="0" name="is_visible">
                <input
                    value="1"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1"
                    id="published_at" type="checkbox" name="is_visible" autofocus="autofocus">
            </div>
            <button class="mt-10 p-3 bg-blue-600 rounded-md hover:bg-blue-400" type="submit">Создать</button>
        </form>
    </div>
@endsection
