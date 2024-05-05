<?php

namespace App\Http\Controllers;

use App\Models\Wizardprocess;
use Illuminate\Http\Request;

class WizardprocessController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $wizardprocess = new Wizardprocess();
            $wizardprocess->setSchema($request->schema);
            $wizardprocess->id_credit = $request->id_credit;
            $wizardprocess->save();

            return response()->json([
                'message' => 'Wizardprocess created successfully'
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wizardprocess $wizardprocess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wizardprocess $wizardprocess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wizardprocess $wizardprocess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wizardprocess $wizardprocess)
    {
        //
    }
}
