<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\KeysPlaces;
use App\Models\UsersChoices;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\FlareClient\View;
use PDF;

class GeneralController extends Controller
{
    public function storeUser(Request $request)
    {
        try {

            // Get the raw data from the request
            $input = $request->all();

            // Check if the birthday field exists and replace '/' with '-'
            $input['birthday'] = date('Y-m-d', strtotime($request->birthday));

            // return $input['birthday'];

            Validator::extend('at_least_ten_years_ago', function ($attribute, $value, $parameters, $validator) {
                $tenYearsAgo = now()->subYears(10);
                return strtotime($value) <= strtotime($tenYearsAgo);
            });

            Validator::replacer('at_least_ten_years_ago', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, 'The :attribute must be at least ten years ago.');
            });

            $validation = Validator::make($request->all(), [
                'firstname' => 'required|min:3',
                'lastname' => 'required|min:3',
                'email' => 'required|email|unique:clients',
                'phone_number' => 'required|digits:8|unique:clients',
                'gender' => 'required',
                'birthday' => 'required|date|at_least_ten_years_ago'
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $code = Str::random(6);

            $client = Clients::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'birthday' => $input['birthday'],
                'code' => '#' . $code
            ]);

            if ($client->id) {

                $details = [
                    'id' => $client->id,
                    'name' => $client->firstname . ' ' . $client->lastname,
                    'email' => $client->email,
                    'code' => $client->code
                ];

                $pdf = PDF::loadView('layouts.pdflayout', $details);
                $pdfContent = $pdf->output();

                $receiver_email = $client->email;
                // $sender_email = env('MAIL_FROM_ADDRESS');
                $sender_email = 'me@gmail.com';

                Mail::send('layouts.email', $details, function ($message) use ($sender_email, $receiver_email, $pdfContent) {
                    $message->from($sender_email, 'Events Planner');
                    $message->to($receiver_email)->subject('Welcome to Our Event!');
                    $message->attachData($pdfContent, 'event.pdf');
                    $message->text('Please see the attached PDF file for more information.');
                });

                return redirect()->back()->with('success', 'You are successfully registered, please check your email to download the event sheet');
            }
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
