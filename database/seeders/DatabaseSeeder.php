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

        DB::insert('INSERT INTO person (name) VALUES (?)', array('admin') );
        
        DB::insert('INSERT INTO employee_role (name) VALUES (?)', array('Administrador') );
        DB::insert('INSERT INTO employee_role (name) VALUES (?)', array('Sem cargo definido') );
        
        DB::insert('INSERT INTO employee (person_id, role_id, admission_date, status) VALUES (?, ?, ?, ?)'
                    , array(1, 1, '2020-06-03', 'ativo'));
        
        DB::insert('INSERT INTO employee_docs (employee_id, pis, ctps, ctps_state, voter_doc_number, 
                    voter_doc_zone, voter_doc_section, army_doc_number, army_doc_agency, army_doc_series) VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
                    , array(1, '1464504403', '1029321-2', 'Rio de Janeiro', '0001920', '123', '0123', NULL, NULL, NULL));

        DB::insert('INSERT INTO employee_timesheet (name) values (?)', array('5x2 - 5 dias trabalhados com 2 dias de folga'));
        DB::insert('INSERT INTO employee_timesheet (name) values (?)', array('12x36 - 12 horas trabalhadas com 36 horas de folga'));

        DB::insert('INSERT INTO employee_shift_type (name) values (?)', array('Segunda à Sexta, folga Sábado e Domingo'));
        DB::insert('INSERT INTO employee_shift_type (name) values (?)', array('Dias alternados'));

        DB::insert('INSERT INTO employee_shift (employee_id, employee_shift_type_id, employee_timesheet_id
                , workload, start_at1, end_at1, start_at2, end_at2, total, worked_days, dayoff) 
                    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
                , array(1, 1, 1, " ", " ", " ", " ", " ", " ", " ", " " ));

    }
}
