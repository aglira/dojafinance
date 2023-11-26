<?php

namespace App\Http\Controllers;

use App\Models\logging;
use Illuminate\Http\Request;

class LoggingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(log $logs)
    {
        $data = [
            'log' => $logs
        ];

        return view('log.index', $data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(logging $logging)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logging $logging)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, logging $logging)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logging $logging)
    {
        //
    }
}
