<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('signature_type')->nullable()->after('signature');
            $table->integer('signature_size')->nullable()->after('signature_type');
            $table->string('signature_mime_type')->nullable()->after('signature_size');
            $table->timestamp('signature_created_at')->nullable()->after('signature_mime_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['signature_type', 'signature_size', 'signature_mime_type', 'signature_created_at']);
        });
    }
};
