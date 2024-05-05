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
            Schema::connection('pgsql')->create("{$schema}.wizardprocess", function (Blueprint $table) use ($schema) {
                $table->id('id_wizardprocess');
                $table->integer('id_credit');
                $table->foreign('id_credit')->references('id')->on("{$schema}.credit");
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
        Schema::dropIfExists('schemas_wizardprocess');
    }
};
