<?php

namespace App\Repository\RayEmployee;

use App\Models\RayEmployees;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\RayEmployee\RayEmployeesRepositoryInterface;

class RayEmployeeRepository implements RayEmployeesRepositoryInterface
{
    public function index()
    {
        $ray_employees = RayEmployees::all();
        return view('Dashboard.ray_employee.index',compact('ray_employees'));
    }

    public function store($request)
    {
        
        $data = $request->validated();

        if($request->has($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        RayEmployees::create($data);
        return redirect()->route('manage_ray_employee.index')->with('success', 'Employee Added Successfully');
  
    }

    public function update($request, $id)
    {
       $data = $request->validated();

       $ray_employee = RayEmployees::findOrFail($id);

                // Hash and update password only if provided
            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']); // Remove password key so it doesn't overwrite the existing one
            }

       $ray_employee->update($data);
       return redirect()->route('manage_ray_employee.index')->with('success', 'Employee Updated Successfully');
    }

    public function destroy($id)
    {
        $ray_employee = RayEmployees::findOrFail($id);
        $ray_employee->delete();
        return redirect()->route('manage_ray_employee.index')->with('success', 'Employee Deleted Successfully');

    }

}