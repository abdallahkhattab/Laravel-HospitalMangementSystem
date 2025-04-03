<?php

namespace App\Http\Controllers\Auth\patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPatientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class PatientLoginController extends Controller
{
      /**
     * Store a newly created resource in storage.
     */
    public function store(LoginPatientRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::PATIENT);
   
    }



    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
