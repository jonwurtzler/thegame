<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddQueueToInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->boolean('queued')->default(false)->after('used');
            $table->timestamp('queued_at')->nullable()->after('queued');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->dropColumn('queued');
            $table->dropColumn('queued_at');
        });
    }
}
