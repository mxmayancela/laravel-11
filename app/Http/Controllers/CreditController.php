<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditRequest;
use App\Models\Credit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schemas = ['schema_pichincha', 'schema_austro', 'schema_cfc'];
        $credits = collect();

        foreach ($schemas as $schema) {
            $results = DB::select("SELECT * FROM {$schema}.credit");
            $credits = $credits->concat($results);
        }

        return $credits;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $credit = new Credit();
            $credit->setSchema($request->schema);
            $credit->creditinstnumber = $request->creditinstnumber;
            $credit->save();

            return response()->json([
                'message' => 'Credit created successfully'
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
    public function show(Credit $credit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credit $credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credit $credit)
    {
        //
    }
}
