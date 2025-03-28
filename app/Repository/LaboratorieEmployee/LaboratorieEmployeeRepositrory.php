<?php
namespace App\Repository\LaboratorieEmployee;

use Exception;
use App\Models\LaboratorieEmployee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\interfaces\LaboratoriesEmployess\LaboratoriesEmployeesRepositoryInterface;

class LaboratorieEmployeeRepositrory implements LaboratoriesEmployeesRepositoryInterface
{    protected $model;

    public function __construct(LaboratorieEmployee $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $laboratorie_employees = $this->model->all();
        return view('Dashboard.Manage_LaboratorieeEmployee.index', compact('laboratorie_employees'));
    }

    public function store($request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            $this->model->create($data);
            
            return redirect()->route('manage_laboratorie_employee.index')
                             ->with('success', 'Laboratorie Employee Created Successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the employee.']);
        }    
    }

    public function update($request, $id)
    {
        try {
            $data = $request->validated();
            $laboratorie_employees = $this->model->findOrFail($id);
            
            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
            
            $laboratorie_employees->update($data);
            
            return redirect()->route('manage_laboratorie_employee.index')
                             ->with('success', 'Laboratorie Employee Updated Successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Employee not found.']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the employee.']);
        }
    }

    public function destroy($id)
    {
        try {
            $laboratorie_employees = $this->model->findOrFail($id);
            $laboratorie_employees->delete();
            
            return redirect()->route('manage_laboratorie_employee.index')
                             ->with('success', 'Laboratorie Employee Deleted Successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['error' => 'Employee not found.']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the employee.']);
        }
    }

}