<?php

namespace App\Http\Controllers\Auth\LaboratorieEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginLaboratorieEmployeeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRayEmployeeRequest;

class LaboratorieEmployeeLoginController extends Controller
{
      /**
     * Store a newly created resource in storage.
     */
    public function store(LoginLaboratorieEmployeeRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::LABORATORIE_EMPLOYEE);
   
    }


 
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('laboratorie_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
