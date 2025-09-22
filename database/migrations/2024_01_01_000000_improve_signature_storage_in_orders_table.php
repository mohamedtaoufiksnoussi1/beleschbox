<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImproveSignatureStorageInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Ajouter des colonnes pour améliorer le stockage des signatures
            $table->string('signature_type')->nullable()->after('signature')->comment('Type de signature: base64, file, url');
            $table->integer('signature_size')->nullable()->after('signature_type')->comment('Taille de la signature en bytes');
            $table->string('signature_mime_type')->nullable()->after('signature_size')->comment('Type MIME de la signature');
            $table->timestamp('signature_created_at')->nullable()->after('signature_mime_type')->comment('Date de création de la signature');
            
            // Ajouter un index pour améliorer les performances
            $table->index(['signature_type', 'signature_size']);
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
            $table->dropIndex(['signature_type', 'signature_size']);
            $table->dropColumn([
                'signature_type',
                'signature_size', 
                'signature_mime_type',
                'signature_created_at'
            ]);
        });
    }
}

