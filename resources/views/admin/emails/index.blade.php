@extends('admin.layouts.layout')
@section('content')
    <div class="w-4/6 flex flex-col font-bold content-around">
        <h2 class="text-3xl text-gray-500">Пользователи</h2>
        <form action="{{route('admin.emails.send')}}" method="post" class="justify-between items-baseline">
            @csrf
            <div class="flex items-center mb-4">
                <label for="message" class="">Сообщение: </label>
                <input
                    class="font-normal w-2/5 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block ml-4"
                    id="message" type="text" name="message" autofocus="autofocus">
            </div>
            <button
                type="submit"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-md">
                Разослать почту
            </button>
        </form>
    </div>
    <div class="flex content-around flex-wrap">
        @foreach($users as $user)
            <div class="m-3 w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden">
                <p>ФИО: {{ $user->name }}</p>
                <p>Email: {{$user->email}}</p>
                <p>Роль пользователя: {{$user->role->name}}</p>
            </div>
        @endforeach
    </div>
    <br><br>
    {{$users->links()}}
@endsection
