<?php

namespace App\Http\Controllers;

use App\Models\AsContractWizardprocess;
use Illuminate\Http\Request;

class AsContractWizardprocessController extends Controller
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
            $asContractWizardprocess = new AsContractWizardprocess();
            $asContractWizardprocess->setSchema($request->schema);
            $asContractWizardprocess->id_wizardprocess = $request->id_wizardprocess;
            $asContractWizardprocess->save();
            return response()->json($asContractWizardprocess, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AsContractWizardprocess $asContractWizardprocess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsContractWizardprocess $asContractWizardprocess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsContractWizardprocess $asContractWizardprocess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsContractWizardprocess $asContractWizardprocess)
    {
        //
    }
}
