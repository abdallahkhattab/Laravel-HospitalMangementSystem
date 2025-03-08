<?php

namespace App\Repository\Ambulances;

use Log;
use App\Models\Ambulance;

use Illuminate\Support\Facades\DB;
use App\interfaces\Ambulances\AmbulanceRepositoryInterface;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    /**
     * Display a listing of ambulance companies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $ambulances = Ambulance::all();
            return view('Dashboard.Ambulance.index', compact('ambulances'));
        } catch (\Exception $e) {
            Log::error('Failed to fetch ambulance: ' . $e->getMessage());
            return back()->with('error', 'Unable to load ambulance companies.');
        }
    }

    /**
     * Show the form for creating a new ambulance company.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Dashboard.Ambulance.create');
    }

    /**
     * Store a newly created ambulance company in the database.
     *
     * @param \App\Http\Requests\AmbulanceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            
            $data['status'] = $request->has('status') ? 1 : 0;

            Ambulance::create($data);

            DB::commit();
            return redirect()->route('ambulance.index')
                ->with('success', trans('Dashboard/Ambulance.ambulance.created_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ambulance creation failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Ambulance.ambulance.create_failed'));
        }
    }

    /**
     * Show the form for editing an ambulance company.
     *
     * @param \App\Models\Ambulance $ambulance
     * @return \Illuminate\View\View
     */
    public function edit($ambulance)
    {
        try {
            return view('Dashboard.Ambulance.edit', compact('ambulance'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form for ambulance: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Ambulance.ambulance.load_edit_failed'));
        }
    }

    /**
     * Update the specified ambulance company in the database.
     *
     * @param \App\Http\Requests\AmbulanceRequest $request
     * @param \App\Models\Ambulance $ambulance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($request, $ambulance)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['status'] = $request->has('status') ? 1 : 0;

            $ambulance->update($data);

            DB::commit();
            return redirect()->route('ambulance.index')
                ->with('success', trans('Dashboard/Ambulance.ambulance.updated_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ambulance company update failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Ambulance.ambulance.update_failed'));
        }
    }

    /**
     * Remove the specified ambulance company from the database.
     *
     * @param \App\Models\Ambulance $ambulance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($ambulance)
    {
        DB::beginTransaction();
        try {
            $ambulance->delete();

            DB::commit();
            return redirect()->route('ambulances.index')
                ->with('success', trans('Dashboard/Ambulance.ambulance.deleted_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ambulance deletion failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Ambulance.ambulance.delete_failed'));
        }
    }
}