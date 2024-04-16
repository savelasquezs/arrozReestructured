<?php

namespace App\Http\Controllers;

use App\Http\Requests\NeighborhoodRequest;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NeighborhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(NeighborhoodRequest $request)
    {
        Neighborhood::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Neighborhood $neighborhood)
    {
        //
    }
}
