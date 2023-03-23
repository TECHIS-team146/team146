<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->index('id')->comment('ID');
            $table->bigInteger('user_id')->index('user_id')->comment('ユーザーID');
            $table->string('name',100)->index('name')->comment('名前');
            $table->smallInteger('type')->nullable()->comment('種別');
            $table->string('detail',500)->nullable()->comment('詳細');
            $table->timestamp('created_at')->nullable()->comment('登録日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
