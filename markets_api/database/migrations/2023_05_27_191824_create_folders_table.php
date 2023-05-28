<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:markets_api/database/migrations/2023_05_27_203135_create_markers_table.php
class CreateMarkersTable extends Migration
========
class CreateFoldersTable extends Migration
>>>>>>>> 7c61ccf566f521fc43d4a58e33681517423ad315:markets_api/database/migrations/2023_05_27_191824_create_folders_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:markets_api/database/migrations/2023_05_27_203135_create_markers_table.php
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->string('id_folder');
            $table->string('title');
            $table->string('description');
            $table->string('url');
            $table->string('url_icon');
            $table->rememberToken();
========
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('id_profile');
            $table->string('name');
            $table->remenberToken();
>>>>>>>> 7c61ccf566f521fc43d4a58e33681517423ad315:markets_api/database/migrations/2023_05_27_191824_create_folders_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:markets_api/database/migrations/2023_05_27_203135_create_markers_table.php
        Schema::dropIfExists('markers');
========
        Schema::dropIfExists('folders');
>>>>>>>> 7c61ccf566f521fc43d4a58e33681517423ad315:markets_api/database/migrations/2023_05_27_191824_create_folders_table.php
    }
}
