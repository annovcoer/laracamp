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
        Schema::table('checkouts', function (Blueprint $table) {

        // Penghapusan column pada table checkout

            // method 1
            // $table->dropColumn('card_number');
            // $table->dropColumn('expired');
            // $table->dropColumn('cvc');
            // $table->dropColumn('is_paid');

            //method 2
            $table->dropColumn(['card_number','expired','cvc','is_paid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkouts', function (Blueprint $table) {
            //role back
            $table->string('card_number', 20)->nullable();
            $table->date('expired')->nullable();
            $table->string('cvc', 3)->nullable();
            $table->boolean('is_paid')->default(false);
        });
    }
};
