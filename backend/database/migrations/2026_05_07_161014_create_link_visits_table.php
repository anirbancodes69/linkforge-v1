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
        Schema::create('link_visits', function (Blueprint $table) {
            $table->id();
            /*
            |--------------------------------------------------------------------------
            | Relations
            |--------------------------------------------------------------------------
            */

            $table->foreignId('link_id')
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Visitor Info
            |--------------------------------------------------------------------------
            */

            $table->ipAddress()->nullable();

            $table->string('country', 100)->nullable();

            $table->string('city', 100)->nullable();

            $table->string('browser', 100)->nullable();

            $table->string('device', 100)->nullable();

            $table->string('platform', 100)->nullable();

            $table->text('user_agent')->nullable();

            $table->text('referrer')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Visit Timestamp
            |--------------------------------------------------------------------------
            */

            $table->timestamp('visited_at');

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Indexes
            |--------------------------------------------------------------------------
            */

            $table->index('link_id');

            $table->index('visited_at');

            $table->index([
                'link_id',
                'visited_at'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_visits');
    }
};
