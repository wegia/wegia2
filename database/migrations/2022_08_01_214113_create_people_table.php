<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        /**
         * Person tables
         */
        Schema::create('person', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->char('gender', 1)->nullable();
            $table->date('birthday')->nullable();
            $table->binary('photo')->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->char('blood_type', 3)->nullable();
            $table->timestamps();
        });

        Schema::create('person_docs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->char('cpf', 14);
            $table->string('rg', 14)->nullable();
            $table->string('rg_agency', 20)->nullable();
            $table->date('rg_date')->nullable();
            $table->string('ibge', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('person_docs', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade');
        });

        /**
         * Contact table
         */
        Schema::create('contact', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->string('street', 100);
            $table->integer('number');
            $table->string('complement', 50)->nullable();
            $table->string('district', 40);
            $table->string('city', 40);
            $table->string('state', 50);
            $table->char('zip_code', 12)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->timestamps();
        });

        Schema::table('contact', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade');
        });

        /**
         * Employee tables
         */
        Schema::create('employee', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->date('admission_date');
            $table->timestamps();
        });

        Schema::create('employee_docs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->string('pis', 20)->nullable();
            $table->string('ctps', 150)->nullable();
            $table->string('ctps_state', 50)->nullable();
            $table->string('voter_doc_number', 15)->nullable();
            $table->string('voter_doc_zone', 3)->nullable();
            $table->string('voter_doc_section', 5)->nullable();
            $table->string('army_doc_number', 20)->nullable();
            $table->string('army_doc_agency', 10)->nullable();
            $table->string('army_doc_series', 5)->nullable();
            $table->timestamps();
        });

        Schema::create('employee_role', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->timestamps();
        });

        Schema::create('employee_situation', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->increments('id');
            $table->string('description', 50);
            $table->datetime('datetime');
            $table->binary('photo')->nullable();
            $table->string('photo_extension', 10)->nullable();
            $table->timestamps();
        });
 
        Schema::create('employee_situation_log', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->unsignedBigInteger('employee_id');
            $table->unsignedInteger('employee_situation_id');
            $table->timestamps();
        });

        Schema::create('employee_shift_type', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();
        });

        Schema::create('employee_timesheet', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();
        });
        
        Schema::create('employee_shift', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedInteger('employee_shift_type_id');
            $table->unsignedInteger('employee_timesheet_id');
            $table->string('workload', 200)->nullable();
            $table->string('start_at1', 200)->nullable();
            $table->string('end_at1', 200)->nullable();
            $table->string('start_at2', 200)->nullable();
            $table->string('end_at2', 200)->nullable();
            $table->string('total', 200)->nullable();
            $table->string('worked_days', 200)->nullable();
            $table->string('dayoff', 200)->nullable();
            $table->timestamps();
        });

        Schema::table('employee_shift', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreign('employee_shift_type_id')->references('id')->on('employee_shift_type')->onDelete('cascade');
            $table->foreign('employee_timesheet_id')->references('id')->on('employee_timesheet')->onDelete('cascade');
        });

        Schema::table('employee_docs', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
        });

        Schema::table('employee', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('employee_role')->onDelete('cascade');
        });

        Schema::table('employee_situation_log', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreign('employee_situation_id')->references('id')->on('employee_situation')->onDelete('cascade');
        });

        /**
         * Beneficiary tables
         */
        Schema::create('beneficiary_status', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('status', 255);
            $table->timestamps();
        });

        Schema::create('beneficiary_type', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('beneficiary_parent_kinship', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->timestamps();
        });

        Schema::create('beneficiary', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('beneficiary_type_id');
            $table->unsignedBigInteger('beneficiary_status_id');
            $table->timestamps();
        });

        Schema::create('beneficiary_parent', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('beneficiary_id');
            $table->unsignedBigInteger('beneficiary_parent_kinship_id');
            $table->unsignedBigInteger('person_id');
            $table->timestamps();
        });

        Schema::table('beneficiary', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->foreign('beneficiary_status_id')->references('id')->on('beneficiary_status')->onDelete('cascade');
            $table->foreign('beneficiary_type_id')->references('id')->on('beneficiary_type')->onDelete('cascade');
        });

        Schema::table('beneficiary_parent', function (Blueprint $table) {
            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
            $table->foreign('beneficiary_parent_kinship_id')->references('id')->on('beneficiary_parent_kinship')->onDelete('cascade');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('beneficiary_parent_kinship');
        Schema::dropIfExists('beneficiary_parent');
        Schema::dropIfExists('beneficiary_status');
        Schema::dropIfExists('beneficiary_type');
        Schema::dropIfExists('beneficiary');

        Schema::dropIfExists('employee_timesheet');     // escala_quadro_horario
        Schema::dropIfExists('employee_shift');         // quadro_horario_funcionario
        Schema::dropIfExists('employee_shift_type');    // tipo_quadro_horario
        Schema::dropIfExists('employee_role');
        Schema::dropIfExists('employee_situation');     // situacao_funcionario
        Schema::dropIfExists('employee_situation_log'); // movimentacao_funcionario
        Schema::dropIfExists('employee_docs');
        Schema::dropIfExists('employee');

        Schema::dropIfExists('contact');
        Schema::dropIfExists('person_docs');
        Schema::dropIfExists('person');
    }
}
