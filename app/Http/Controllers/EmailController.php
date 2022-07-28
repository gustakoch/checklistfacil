<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Email;
use App\Models\EmailsCake;
use App\Notifications\NewEmailInterested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:emails|email|max:255'
        ]);

        $email = Email::create($validated);
        $cakesWithAmount = Cake::where('amount', '>=', 1)->get();

        if (count($cakesWithAmount) > 0) {
            foreach ($cakesWithAmount as $cake) {
                EmailsCake::create([
                    'cake_id' => $cake->id,
                    'email_id' => $email->id
                ]);
            }

            Notification::route('mail', [config('mail.from.address')])
                ->notify(new NewEmailInterested($cakesWithAmount));
        }

        return response()->json($email);
    }
}
