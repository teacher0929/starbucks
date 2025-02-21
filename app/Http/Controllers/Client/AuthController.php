<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Gift;
use App\Models\Notification;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('client.auth.login');
    }


    public function verify(Request $request)
    {
        $request->validate([
            'phone' => 'required|integer|between:60000000,71999999',
        ]);

        Verification::updateOrCreate([
            'phone' => $request->phone,
        ], [
            'code' => rand(10000, 99999),
            'status' => 0,
        ]);

        // Send OTP

        return view('client.auth.verify')
            ->with([
                'phone' => $request->phone,
            ]);
    }


    public function confirm(Request $request)
    {
        $request->validate([
            'phone' => 'required|integer|between:60000000,71999999',
            'code' => 'required|integer|between:10000,99999',
        ]);

        $verification = Verification::where('phone', $request->phone)
            ->where('code', $request->code)
            ->where('status', 0)
            ->where('updated_at', '>', now()->subMinutes(3))
            ->orderBy('id', 'desc')
            ->first();

        if ($verification) {
            $verification->status = 1;
            $verification->update();

            $customer = Customer::where('username', $request->phone)->first();

            if ($customer) {
                auth('customer_web')->login($customer);

                return to_route('home')
                    ->with([
                        'success' => trans('app.successfullyLoggedIn'),
                    ]);
            } else {
                return view('client.auth.confirm')
                    ->with([
                        'phone' => $request->phone,
                        'code' => $request->code,
                    ]);
            }
        } else {
            $verification->status = 2;
            $verification->update();

            return to_route('login')
                ->with([
                    'error' => trans('app.invalidVerificationCode'),
                ]);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|integer|between:60000000,71999999',
            'code' => 'required|integer|between:10000,99999',
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'invitation_code' => 'nullable|string|size:10',
        ]);

        $verification = Verification::where('phone', $request->phone)
            ->where('code', $request->code)
            ->where('status', 1)
            ->where('updated_at', '>', now()->subMinutes(5))
            ->orderBy('id', 'desc')
            ->first();

        if ($verification) {
            if ($request->has('invitation_code') and isset($request->invitation_code)) {
                $invitedCustomer = Customer::where('invitation_code', str($request->invitation_code)->upper())
                    ->first();
            }

            $customer = Customer::create([
                'invited_id' => isset($invitedCustomer) ? $invitedCustomer->id : null,
                'name' => $request->name,
                'surname' => $request->surname,
                'username' => $request->phone,
                'password' => bcrypt(str()->random(10)),
                'invitation_code' => str(str()->random(10))->upper(),
                'language' => ['en' => 0, 'ru' => 1][app()->getLocale()],
            ]);

            if (isset($invitedCustomer)) {
                $obj = new Gift();
                $obj->customer_id = $invitedCustomer->id;
                $obj->starts_at = today();
                $obj->ends_at = today()->addMonth();
                $obj->note = 'Invited ' . $customer->getName();
                $obj->save();

                $obj = new Notification();
                $obj->customer_id = $invitedCustomer->id;
                $obj->title = 'You have won a free coffee';
                $obj->body = 'Dear Customer, thank you for inviting your friend!';
                $obj->save();

                $obj = new Gift();
                $obj->customer_id = $customer->id;
                $obj->starts_at = today();
                $obj->ends_at = today()->addMonth();
                $obj->note = 'Invited by ' . $invitedCustomer->getName();
                $obj->save();

                $obj = new Notification();
                $obj->customer_id = $customer->id;
                $obj->title = 'You have won a free coffee';
                $obj->body = 'Dear Customer, thank you for accepting your friend\'s invitation!';
                $obj->save();
            }

            auth('customer_web')->login($customer);

            return to_route('home')
                ->with([
                    'success' => trans('app.successfullyLoggedIn'),
                ]);
        } else {
            $verification->status = 2;
            $verification->update();

            return to_route('login')
                ->with([
                    'error' => trans('app.invalidVerificationCode'),
                ]);
        }
    }


    public function destroy(Request $request)
    {
        Auth::guard('customer_web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
