<?php

namespace App\Http\Controllers;

use App\Models\Workoutplan;
use App\Http\Requests\StoreWorkoutplanRequest;
use App\Http\Requests\UpdateWorkoutplanRequest;
use Illuminate\View\View;

class WorkoutplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.plans.plansIndex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkoutplanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Workoutplan $workoutplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workoutplan $workoutplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkoutplanRequest $request, Workoutplan $workoutplan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workoutplan $workoutplan)
    {
        //
    }
}
