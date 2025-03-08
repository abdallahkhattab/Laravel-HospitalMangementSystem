<?php

namespace App\Repository\Insurances;

use Log;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    /**
     * Display a listing of insurance companies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $insurances = Insurance::all();
            return view('Dashboard.Insurance.index', compact('insurances'));
        } catch (\Exception $e) {
            Log::error('Failed to fetch insurance companies: ' . $e->getMessage());
            return back()->with('error', 'Unable to load insurance companies.');
        }
    }

    /**
     * Show the form for creating a new insurance company.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Dashboard.Insurance.create');
    }

    /**
     * Store a newly created insurance company in the database.
     *
     * @param \App\Http\Requests\InsuranceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['status'] = $request->has('status') ? 1 : 0;

            Insurance::create($data);

            DB::commit();
            return redirect()->route('insurance.index')
                ->with('success', trans('Dashboard/Insurance.insurance.created_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Insurance company creation failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Insurance.insurance.create_failed'));
        }
    }

    /**
     * Show the form for editing an insurance company.
     *
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\View\View
     */
    public function edit($insurance)
    {
        try {
            return view('Dashboard.Insurance.edit', compact('insurance'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form for insurance company: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Insurance.insurance.load_edit_failed'));
        }
    }

    /**
     * Update the specified insurance company in the database.
     *
     * @param \App\Http\Requests\InsuranceRequest $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($request, $insurance)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['status'] = $request->has('status') ? 1 : 0;

            $insurance->update($data);

            DB::commit();
            return redirect()->route('insurance.index')
                ->with('success', trans('Dashboard/Insurance.insurance.updated_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Insurance company update failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Insurance.insurance.update_failed'));
        }
    }

    /**
     * Remove the specified insurance company from the database.
     *
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($insurance)
    {
        DB::beginTransaction();
        try {
            $insurance->delete();

            DB::commit();
            return redirect()->route('insurance.index')
                ->with('success', trans('Dashboard/Insurance.insurance.deleted_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Insurance company deletion failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Insurance.insurance.delete_failed'));
        }
    }
}