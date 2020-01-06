<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('expense_category_id');
            $table->decimal('amount', 19, 2);
            $table->date('entry_date');
            $table->timestamps();

            $table->foreign('expense_category_id')->references('id')->on('expense_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
