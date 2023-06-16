<?php

namespace App\Http\Controllers;

use App\Jobs\MailSenderJob;
use App\Mail\UserSendMail;
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

    public function send(Request $request): RedirectResponse
    {
        $message = $request['message'];
        $users = User::query()->where('role_id', 2)->get();

        foreach ($users as $user) {
            MailSenderJob::dispatch($user, $message);
        }
        return redirect()->route('admin.emails.index');
    }
}
