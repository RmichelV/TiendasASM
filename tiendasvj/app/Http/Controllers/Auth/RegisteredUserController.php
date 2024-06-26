<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Date;

use App\Models\carrito;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑ]+(\s[a-zA-ZñÑ]+)?$/'],
            'last_name' => ['required', 'string', 'max:255','regex:/^[a-zA-ZñÑ]+(\s[a-zA-ZñÑ]+)?$/'],
            'birthday' => ['required', 'date','after_or_equal:1920-01-01', 'before_or_equal:2020-12-31'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'last_name'=> $request->last_name,
            'birthday'=> $request->birthday,
            'password' => Hash::make($request->password),
            'id_rol'=>3,
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
