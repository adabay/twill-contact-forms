<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormsTables extends Migration
{
    public function up()
    {
        Schema::create('contact_forms', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('contact_form_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'contact_form');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('successPage')->nullable();
        });

        Schema::create('contact_form_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'contact_form');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_form_revisions');
        Schema::dropIfExists('contact_form_translations');
        Schema::dropIfExists('contact_forms');
    }
}
