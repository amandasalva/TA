<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('login.password-email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token' => $token, 'email' => $request->email]);
        $body = "Kami menerima permintaan untuk mengatur ulang kata sandi untuk akun <b>SIAKAS</b> yang terkait dengan ".$request->email.". 
        Anda dapat mengatur ulang kata sandi Anda dengan mengklik tautan di bawah ini :";
        
        Mail::send('login.forgot-email', ['action_link' => $action_link, 'body' => $body], function($message) use ($request) {
            $message->from('lalakloper@gmail.com', 'SIAKAS');
            $message->to($request->email, 'Manda')->subject('Reset Pasword');
        });

        return back()->with('success', 'Kami telah mengirimkan tautan untuk mengatur ulang kata sandi Anda melalui email!');
        
        // $status = Password::sendResetLink($request->only('email'));

        // return $status === Password::RESET_LINK_SENT
        // ? response()->json(['message' => 'Reset password link sent to your email'])
        // : response()->json(['message' => 'Unable to send reset password link.'], 400);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('login.reset-password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
        ]);

        $check_token = DB::table('password_reset_tokens')->where([
            // 'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('error', 'Invalid token');
        } else
        {
            User::where('email', $check_token->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_reset_tokens')->where([
                'email' => $check_token->email
            ])->delete();

            return redirect()->route('pegawai.login')
            ->with('info', 'Kata sandi Anda berhasil diperbaharui! Anda dapat masuk dengan kata sandi yang baru ini')
            ->with('verifiedEmail', $check_token->email);
        }
    }
}