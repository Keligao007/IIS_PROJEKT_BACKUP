<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSumaToObjednavkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('objednavka', function (Blueprint $table) {
            // Only add the suma column
            $table->decimal('suma', 10, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('objednavka', function (Blueprint $table) {
            $table->dropColumn('suma');
        });
    }
}
