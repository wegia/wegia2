<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // povoando tabelas auxiliares
        DB::insert('INSERT INTO cargo (nome) VALUES (?)', array('Administrador') );
        DB::insert('INSERT INTO cargo (nome) VALUES (?)', array('Sem cargo definido') );

        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Acre', 'AC'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Alagoas', 'AL'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Amapá', 'AP'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Amazonas', 'AM'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Bahia', 'BA'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Brasília', 'DF'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Ceará', 'CE'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Espírito Santo', 'ES'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Goiás', 'GO'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Maranhão', 'MA'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Mato Grosso', 'MT'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Mato Grosso do Sul', 'MS'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Minas Gerais', 'MG'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Pará', 'PA'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Paraiba', 'PB'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Paraná', 'PR'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Pernambuco', 'PE'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Piaui', 'PI'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Rio de Janeiro', 'RJ'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Rio Grande do Norte', 'RN'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Rio Grande do Sul', 'RS'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Rondônia', 'RO'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Roraima', 'RR'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Santa Catarina', 'SC'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('São Paulo', 'SP'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Sergipe', 'SE'));
        DB::insert('INSERT INTO uf (nome, sigla) values (?,?)', array('Tocantins', 'TO'));

        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Cônjuge'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Pai'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Mãe'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Filho(a)'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Tio(a)'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Cunhado(a)'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Sobrinho(a)'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Neto(a)'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Primo(a)'));
        DB::insert('INSERT INTO parentesco (nome) values (?)', array('Enteado(a)'));

        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Vencimento Básico'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Vale-alimentação'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Vale-refeição'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Vale-transporte'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Salário Família'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Adicional Noturno'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Insalubridade'));
        DB::insert('INSERT INTO tipo_remuneracao (nome) values (?)', array('Periculosidade'));

        DB::insert('INSERT INTO escala (nome) values (?)', array('5x2 - 5 dias trabalhados com 2 dias de folga'));
        DB::insert('INSERT INTO escala (nome) values (?)', array('12x36 - 12 horas trabalhadas com 36 horas de folga'));

        DB::insert('INSERT INTO tipo_escala (nome) values (?)', array('Segundas às sextas, folga aos sábados e domingos'));
        DB::insert('INSERT INTO tipo_escala (nome) values (?)', array('Dias alternados'));

        // criando uma pessoa de teste
        DB::insert('INSERT INTO colaborador (login,senha) VALUES (?, ?)', array('teste@cefet-rj.br', 'a'));

        ///// 2023-03-23
        //refazer esse seed
        //////////////////
        /*
        DB::insert('INSERT INTO funcionario (
                        , colab_id, nome, genero, admissao, situacao, foto
                        , nascimento, nome_mae, nome_pai, tipo_sanguineo
                        , cpf, rg, rg_orgao, rg_expedicao, rg_vencimento
                        , pis, ctps, ctps_uf
                        , eleitor_numero, eleitor_zona, eleitor_secao
                        , reserv_numero, reserv_orgao, reserv_serie) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
                            , array(1, 'João', 'm', null, 'a', null
                            , null, null ,'1464504403', '1029321-2', 'RJ' 
                            ,'0001920', '123', '0123', NULL, NULL, NULL));
        

        DB::insert('INSERT INTO contato (pessoa_id, logradouro, numero, complemento, bairro, cidade, estado, cep, telefone, celular, email)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)', array(1, 'Av. Governador Roberto Silveira', 1900, 'Antigo prédio do Detro', 'Prado'
                    , 'Nova Friburgo', 'RJ', '28621-000', '(22)2527-1727', '(22)99999-9991', 'teste@cefet-rj.br'));

        
        
        DB::insert('INSERT INTO colab_tem_cargo (colab_id, cargo_id) VALUES (?, ?)', array(1, 1));


        */

        DB::insert('INSERT INTO horario (entrada, saida, inicio, fim, dia_semana, colab_id) values (?,?,?,?,?,?)'
            , array('08:00', '17:00', '2020-01-03', NULL, 'SEG', 1));
        DB::insert('INSERT INTO horario (entrada, saida, inicio, fim, dia_semana, colab_id) values (?,?,?,?,?,?)'
            , array('08:00', '17:00', '2020-01-03', NULL, 'TER', 1));
        DB::insert('INSERT INTO horario (entrada, saida, inicio, fim, dia_semana, colab_id) values (?,?,?,?,?,?)'
            , array('08:00', '17:00', '2020-01-03', NULL, 'QUA', 1));
            DB::insert('INSERT INTO horario (entrada, saida, inicio, fim, dia_semana, colab_id) values (?,?,?,?,?,?)'
            , array('08:00', '17:00', '2020-01-03', NULL, 'QUI', 1));
        DB::insert('INSERT INTO horario (entrada, saida, inicio, fim, dia_semana, colab_id) values (?,?,?,?,?,?)'
            , array('08:00', '17:00', '2020-01-03', NULL, 'SEX', 1));
        

    }
}
