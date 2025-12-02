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
        Schema::table('lecturers', function (Blueprint $table) {
            $table->string('birth_year')->nullable()->after('name');
            $table->text('degree')->nullable()->after('position');
            $table->string('teaching_certificate')->nullable()->after('degree');
            $table->longText('experience')->nullable()->after('teaching_certificate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropColumn(['birth_year', 'degree', 'teaching_certificate', 'experience']);
        });
    }
};
