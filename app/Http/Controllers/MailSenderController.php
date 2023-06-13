<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSenderController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);
        return view('admin.emails.index', ['users' => $users]);
    }

    public function store(): RedirectResponse
    {
        $users = User::query()->where('role_id', 2)->get();
        foreach ($users as $user) {
            Mail::to('bv@tdsgn.ru')->queue(new MailSender($user));
        }
        return redirect()->back();
    }
}
