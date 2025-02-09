<?php

use App\Providers\AppServiceProvider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('hourly_rate')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('parent_id')->nullable()->constrained('users', 'id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
