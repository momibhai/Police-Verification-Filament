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
        Schema::create('criminal_records', function (Blueprint $table) {
            $table->id();
            $table->string('criminal_name', 20);
            $table->string('criminal_address', 30);
            $table->date('criminal_dob');
            $table->string('criminal_mobile', 11); // changed from integer to string to accommodate maxLength(11)
            $table->string('criminal_nic', 13); // changed from integer to string to accommodate maxLength(13)
            $table->string('father_name', 20);
            $table->string('father_nic', 13); // changed from integer to string to accommodate maxLength(13)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminal_records');
    }
};
