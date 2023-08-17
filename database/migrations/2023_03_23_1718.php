<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pessoa');
        Schema::dropIfExists('tipo_arquivo');
        Schema::dropIfExists('escala');
        Schema::dropIfExists('tipo_escala');
        Schema::dropIfExists('tipo_remuneracao');
        Schema::dropIfExists('uf');
        Schema::dropIfExists('parentesco');
        Schema::dropIfExists('cargo');
        Schema::dropIfExists('colaborador');
        Schema::dropIfExists('funcionario');
        Schema::dropIfExists('voluntario');
        Schema::dropIfExists('arquivo');
        Schema::dropIfExists('horario');
        Schema::dropIfExists('colab_tem_cargo');
        Schema::dropIfExists('remuneracao');
        Schema::dropIfExists('dependente');
        Schema::dropIfExists('colab_tem_escala');
        Schema::dropIfExists('contato');

        ///////////////////////////////////////
        // TABELAS SEM CHAVES ESTRANGEIRAS
        // >> não têm dependências e por isso
        // >> devem ser criadas antes
        ///////////////////////////////////////

        Schema::create('pessoa', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->char('genero', 1)->nullable();
            $table->date('nascimento')->nullable();
            $table->binary('foto')->nullable();
            $table->string('nome_mae', 100)->nullable();
            $table->string('nome_pai', 100)->nullable();
            $table->char('tipo_sangue', 3)->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_arquivo', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->tinyIncrements('id');
            $table->string('nome', 45);
            $table->timestamps();
        });

        Schema::create('escala', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->tinyIncrements('id');
            $table->string('nome', 100);
            $table->string('descricao', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_escala', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->tinyIncrements('id');
            $table->string('nome', 100);
            $table->timestamps();
        });

        Schema::create('tipo_remuneracao', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->tinyIncrements('id');
            $table->string('nome', 45);
            $table->timestamps();
        });

        Schema::create('uf', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->tinyIncrements('id');
            $table->string('nome', 45);
            $table->char('sigla', 2);
            $table->timestamps();
        });

        Schema::create('parentesco', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->tinyIncrements('id');
            $table->string('nome', 45);
            $table->timestamps();
        });

        Schema::create('cargo', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->smallIncrements('id');
            $table->string('nome', 45);
            $table->string('descricao', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('colaborador', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->string('login', 255);
            $table->string('senha', 255);
            $table->unsignedBigInteger('pessoa_id');
            $table->date('admissao')->default(date("Y-m-d H:i:s"))->nullable();
            $table->enum('situacao', ['a', 'i'])->default('a');
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 14)->nullable();
            $table->string('rg_orgao', 20)->nullable();
            $table->date('rg_expedicao')->nullable();
            $table->date('rg_vencimento', 5)->nullable();

            $table->timestamps();

        });

        ///////////////////////////////////////
        // TABELAS COM CHAVES ESTRANGEIRAS
        // >> têm dependências
        // >> só devem ser criadas depois que
        // >> a tabela de origem da chave estiver
        // >> estiver criada
        ///////////////////////////////////////

        Schema::create('funcionario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('colab_id');

            $table->string('pis', 20)->nullable();
            $table->string('ctps', 150)->nullable();
            $table->char('ctps_uf', 2)->nullable();
            $table->string('eleitor_numero', 15)->nullable();
            $table->string('eleitor_zona', 4)->nullable();
            $table->string('eleitor_secao', 5)->nullable();
            $table->string('reserv_numero', 20)->nullable();
            $table->string('reserv_orgao', 10)->nullable();
            $table->string('reserv_serie', 5)->nullable();

            $table->timestamps();
            //setting keys
            $table->foreign('colab_id')->references('id')->on('colaborador')->onDelete('cascade');
        });

        Schema::create('voluntario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('colab_id');

            $table->string('disponib_semana', 45)->nullable();
            $table->string('disponib_horas', 45)->nullable();
            $table->string('descricao', 100)->nullable();

            $table->timestamps();

            //setting keys
            $table->foreign('colab_id')->references('id')->on('colaborador')->onDelete('cascade');
        });

        //contatos
        Schema::create('contato', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('pessoa_id');
            $table->string('logradouro')->nullable();
            $table->unsignedInteger('numero')->nullable();
            $table->string('complemento', 45)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->char('estado', 2)->nullable();
            $table->char('cep', 12)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('ibge', 7)->nullable();

            $table->timestamps();

            //setting keys
            $table->foreign('pessoa_id')->references('id')->on('pessoa')->onDelete('cascade');
        });

        Schema::create('arquivo', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedTinyInteger('tipo_id');
            $table->binary('foto');
            $table->string('descricao', 200)->nullable();
            $table->date('data_cadastro')->default(date("Y-m-d H:i:s"))->nullable();
            $table->timestamps();

            //setting keys
            $table->foreign('pessoa_id')->references('id')->on('pessoa')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipo_arquivo')->onDelete('cascade');
        });

        Schema::create('horario', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('colab_id');
            $table->time('entrada', $precision = 0);
            $table->time('saida', $precision = 0);
            $table->date('inicio');
            $table->date('fim')->nullable();
            $table->char('dia_semana',3)->nullable();
            $table->timestamps();

            //setting keys
            $table->foreign('colab_id')->references('id')->on('colaborador')->onDelete('cascade');
        });

        Schema::create('colab_tem_cargo', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('colab_id');
            $table->unsignedSmallInteger('cargo_id');
            $table->date('inicio')->default(date("Y-m-d H:i:s"));
            $table->date('fim')->nullable();
            $table->boolean('e_cargo_atual')->default(true);
            $table->timestamps();

            //setting keys
            $table->foreign('colab_id')->references('id')->on('colaborador')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargo')->onDelete('cascade');
        });

        Schema::create('colab_tem_escala', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('colab_id');
            $table->unsignedTinyInteger('escala_id');
            $table->unsignedTinyInteger('tipo_id');
            $table->date('inicio')->default(date("Y-m-d H:i:s"));
            $table->date('fim')->nullable();
            $table->timestamps();

            //setting keys
            $table->foreign('colab_id')->references('id')->on('colaborador')->onDelete('cascade');
            $table->foreign('escala_id')->references('id')->on('escala')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipo_escala')->onDelete('cascade');
        });


        Schema::create('remuneracao', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('func_id');
            $table->unsignedTinyInteger('tipo_id');
            $table->decimal('valor', $precision=8, 2);
            $table->date('inicio')->default(date("Y-m-d H:i:s"));
            $table->date('fim')->nullable();

            $table->timestamps();

            //setting keys
            $table->foreign('func_id')->references('id')->on('funcionario')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipo_remuneracao')->onDelete('cascade');
        });

        Schema::create('dependente', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->bigIncrements('id');
            $table->unsignedBigInteger('func_id');
            $table->string('nome', 100);
            $table->char('genero', 1);
            $table->string('telefone', 20)->nullable();
            $table->date('nascimento')->nullable();
            $table->string('parentesco', 45);
            $table->string('cpf', 14)->nullable();
            $table->string('rg', 14)->nullable();
            $table->string('rg_orgao', 20)->nullable();
            $table->date('rg_expedicao')->nullable();
            $table->date('rg_vencimento', 5)->nullable();

            $table->timestamps();

            //setting keys
            $table->foreign('func_id')->references('id')->on('funcionario')->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('colab_tem_cargo');
        Schema::dropIfExists('cargo');
        Schema::dropIfExists('colab_tem_escala');
        Schema::dropIfExists('escala');
        Schema::dropIfExists('horario');
        Schema::dropIfExists('arquivo');
        Schema::dropIfExists('tipo_arquivo');
        Schema::dropIfExists('colab_doc');
        Schema::dropIfExists('remuneracao');
        Schema::dropIfExists('tipo_remuneracao');
        Schema::dropIfExists('contato');
        Schema::dropIfExists('voluntario');
        Schema::dropIfExists('parentesco');
        Schema::dropIfExists('dependente');
        Schema::dropIfExists('funcionario');
        Schema::dropIfExists('colaborador');
        Schema::dropIfExists('uf');
    }
};
