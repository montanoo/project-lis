<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->state === 2) {
            $request->validate([
                'cname' => 'required|string|max:255',
                'cnit' => 'required|string|max:255',
                'caddress' => 'required|string|max:255',
                'cphone' => 'required|string|max:9',
                'cuser' => 'required|string|max:255|unique:' . User::class,
                'cemail' => 'required|string|lowercase|email|max:255|unique:' . User::class,
                'cpassword' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'username' => $request->cuser,
                'email' => $request->cemail,
                'password' => Hash::make($request->cpassword),
                'state_id' => 2,
            ]);
            event(new Registered($user));
            Auth::login($user);

            Company::create([
                'name' => $request->cname,
                'nit' => $request->cnit,
                'address' => $request->caddress,
                'phone' => $request->cphone,
                'user_id' => $user->id,
            ]);

            return redirect(RouteServiceProvider::HOME);
        };
        $request->validate([
            'username' => 'required|string|lowercase|max:255|unique:' . User::class,
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dui' => 'required|string|max:255',
            'birthdate' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'state_id' => 1,
        ]);
        event(new Registered($user));
        Auth::login($user);

        Client::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'dui' => $request->dui,
            'birthdate' => $request->birthdate,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
