<?php

namespace App\Http\Controllers;

use App\Models\Wizardprocess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WizardprocessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listSchemas = DB::select("SELECT schema_name FROM information_schema.schemata WHERE schema_name LIKE 'schema_%'");
        $wizardprocesses = collect();

        foreach ($listSchemas as $schema) {
            //$results = DB::select("SELECT * FROM {$schema}.wizardprocess JOIN {$schema}.credit ON {$schema}.wizardprocess.id_credit = {$schema}.credit.id");
            $results = DB::table("{$schema->schema_name}.wizardprocess")
                ->join("{$schema->schema_name}.credit", "{$schema->schema_name}.wizardprocess.id_credit", "=", "{$schema->schema_name}.credit.id")
                ->leftJoin('institution', 'institution.id_institution', '=', "{$schema->schema_name}.wizardprocess.id_institution")
                ->get();
            $wizardprocesses = $wizardprocesses->concat($results);
        }

        return $wizardprocesses;
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
            $wizardprocess->id_institution = $request->id_institution;
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
