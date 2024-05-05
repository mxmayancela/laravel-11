<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            Schema::connection('pgsql')->create("{$schema}.as_contract_wizardprocess", function (Blueprint $table) use ($schema) {
                $table->id('id_as_contract_wizardprocess');
                $table->integer('id_wizardprocess');
                $table->foreign('id_wizardprocess')->references('id_wizardprocess')->on("{$schema}.wizardprocess");
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
        Schema::dropIfExists('schemas_as');
    }
};
