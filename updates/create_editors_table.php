<?php

namespace Adrenth\TinyMce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * Class CreateEditorsTable
 *
 * @package Adrenth\TinyMce\Updates
 */
class CreateEditorsTable extends Migration
{
    public function up()
    {
        Schema::create('adrenth_tinymce_editors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 40);
            $table->text('configuration');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrenth_tinymce_editors');
    }
}
