<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            
                $table->id();
                $table->string('usertype')->nullable()->comment('Student,Employee,Admin');
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('mobile')->nullable();
                $table->string('address')->nullable();
                $table->string('gender')->nullable();
                $table->string('image')->nullable();
                $table->string('fname')->nullable();
                $table->string('mname')->nullable();
                $table->string('religion')->nullable();
                $table->string('id_no')->nullable();
                $table->date('dob')->nullable();
                $table->string('code')->nullable();
                $table->string('role')->nullable()->comment('admin=head of sotware,operator=computer operator,user=employee');
                $table->date('join_date')->nullable();
                $table->integer('designation_id')->nullable();
                $table->double('salary')->nullable();
                $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active');
                $table->rememberToken();
                $table->foreignId('current_team_id')->nullable();
                $table->text('profile_photo_path')->nullable();
                $table->timestamps();





            
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
       
       
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
