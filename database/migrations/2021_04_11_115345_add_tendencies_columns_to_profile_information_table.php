<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTendenciesColumnsToProfileInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_information', function (Blueprint $table) {
            $table->integer('iam')->after('profile_picture')->nullable();
            $table->integer('looking_for')->after('iam')->nullable();
            $table->integer('from')->after('looking_for')->nullable();
            $table->integer('to')->after('from')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_information', function (Blueprint $table) {
            $table->dropColumn('iam','looking_for','from','to');
        });
    }
}
