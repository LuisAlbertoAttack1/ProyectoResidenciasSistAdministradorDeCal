<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            //INGRESAR AL SISTEMA SOLO PIDE 
                //- > USER Y CONTRASEÑA
            //CREAR USUARIO 
                // NOMBRE DE USUARIO, CONTRASEÑA DE 4 A 6 DIG 
                // NOMBRE DE PROFESOR   
                // APELLIDO MATERNO Y PATERNO
            $table->id();
            $table->string('name');
            $table->string('apellidoPaternoUsuario');
            $table->string('apellidoMaternoUsuario');
            //AQUI SE COLOCA EL NULLABLE POR QUE NO ES IMPORTANTE QUE SE LLENE
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user');
            $table->string('password');
            $table->string('rol');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name'=> 'Maria De Lourdes',
            'apellidoPaternoUsuario'=>'Martinez',
            'apellidoMaternoUsuario'=>'Anzures',
            'email'=> now(),
            'email_verified_at'=> now(),
            'user'=> 'Mtra.LourdesMtz',
            'rol'=> 'Subdireccion',
           'password'=> Hash::make('Anzures1'),

           'created_at'=> now(),
           'updated_at'=> now(),
           
        ]);
        DB::table('users')->insert([
            'name'=> 'Lizeth',
            'apellidoPaternoUsuario'=>'Labarrios',
            'apellidoMaternoUsuario'=>'Medina',
            'email'=> now(),
            'email_verified_at'=> now(),
            'user'=> 'Mtra.LizethLabarriosMedina',
            'rol'=> 'docente',
           'password'=> Hash::make('LIZE4345'),

           'created_at'=> now(),
           'updated_at'=> now(),
           
        ]);
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
