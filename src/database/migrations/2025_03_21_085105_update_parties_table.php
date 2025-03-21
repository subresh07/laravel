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
        Schema::table('parties', function (Blueprint $table) {
            // Make city nullable
            $table->string('city')->nullable()->change();

            // Add indexes
            $table->index('full_name', 'parties_full_name_index');
            $table->index('city', 'parties_city_index');

            // Add soft deletes
            $table->softDeletes()->comment('Timestamp for soft deletion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parties', function (Blueprint $table) {
            // Revert city to not nullable (optional, adjust as needed)
            $table->string('city')->nullable(false)->change();

            // Drop indexes
            $table->dropIndex('parties_full_name_index');
            $table->dropIndex('parties_city_index');

            // Drop soft deletes
            $table->dropSoftDeletes();
        });
    }
};