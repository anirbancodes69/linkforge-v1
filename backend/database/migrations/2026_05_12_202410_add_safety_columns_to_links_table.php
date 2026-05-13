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
        Schema::table('links', function (Blueprint $table) {
            $table->enum('safety_status', [
                'pending',
                'safe',
                'malicious',
            ])->default('pending');

            $table->timestamp('scanned_at')
                ->nullable();

            $table->text('scan_reason')
                ->nullable();

            $table->index('safety_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn([
                'safety_status',
                'scanned_at',
                'scan_reason'
            ]);
        });
    }
};
