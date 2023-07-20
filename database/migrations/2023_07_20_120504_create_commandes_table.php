<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Client;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prix_total')->nullable();
            $table->integer('kilos')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            // $table->foreignIdFor(Client::class)->constrained();
            $table->string('status')->default('en attente');
            $table->boolean('payed')->default(false);
            $table->boolean('deleted')->default(false);
            $table->date('date_retour')->nullable();
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
        Schema::dropIfExists('commandes');
    }
}
