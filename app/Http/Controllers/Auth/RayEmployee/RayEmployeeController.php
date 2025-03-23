<?php

namespace App\Http\Controllers\Auth\RayEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRayEmployeeRequest;

class RayEmployeeController extends Controller
{
      /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRayEmployeeRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::RAY_EMPLOYEE);

        
    }


 
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('ray_employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
