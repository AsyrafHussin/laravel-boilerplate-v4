<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Show login page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  App\Http\Requests\LoginRequest  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function auth(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $role = auth()->user()->getRoles()[0];

            if ($role) {
                return redirect()->route($role.'.home');
            }

            auth()->logout();

            return back()->with('errorMessage', 'Error. Cannot Login')
                ->withInput($request->except('password'));
        }

        return back()->with([
            'errorMessage' => 'Invalid email or password',
        ])->withInput($request->except('password'));
    }

    /**
     * Log the user out of the application.
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login')->with([
            'successMessage' => 'Successfully logout',
        ]);
    }
}
