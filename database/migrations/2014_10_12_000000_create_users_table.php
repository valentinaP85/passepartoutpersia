<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('company')->nullable();
            $table->boolean('is_private')->default(true);
            $table->string('fiscal_code')->nullable();
            $table->string('identity_card_num')->nullable();
            $table->date('identity_card_expiration')->nullable();
            $table->string('identity_card_photo')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('pec')->nullable();
            $table->string('sdi')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('active')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_revisor')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        
        $user1 = new User();
        $user1->id = "1";
        $user1->name = "Admin";
        $user1->email = "adminadmin@admin.com";
        $user1->password = bcrypt('giuliagiulia');
        $user1->is_private = 1;
        $user1->active = 1;
        $user1->is_admin = 1;
        $user1->is_revisor = 1;
        $user1->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
