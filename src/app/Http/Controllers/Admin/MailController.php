<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\AdminMail;
use App\Http\Requests\SendMailRequest;

class MailController extends Controller
{
    public function showMailForm()
    {
        return view('admin.mail');
    }

    public function sendMail(SendMailRequest $request)
    {
        $data = $request->all();
        $emails = User::pluck('email')->all();
        foreach ($emails as $email) {
            Mail::to($email)->send(new AdminMail($data['mail_subject'], $data['mail_message']));
        }

        return redirect('/admin/mail')->with('result', 'メール送信が完了しました');
    }
}
