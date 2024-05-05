<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $schemas = [
            'schema_pichincha',
            'schema_cfc',
            'schema_austro',
        ];

        foreach ($schemas as $schema) {
            DB::connection('pgsql')->statement("CREATE SCHEMA IF NOT EXISTS {$schema}");
            Schema::connection('pgsql')->create("{$schema}.credit", function (Blueprint $table) {
                $table->id();
                $table->string('creditinstnumber');
                $table->timestamps();
                $table->softDeletes();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schemas_credit');
    }
};
