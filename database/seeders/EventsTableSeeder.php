<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('events')->insert([
             /* 
            ['id'=>1, 'text'=>'Gilmar Junior - Restauração', 'start_date'=>'2018-12-05 08:00:00',
                 'end_date'=>'2018-12-05 09:30:00', 'color'=>'green'],
            ['id'=>2, 'text'=>'Dr Marcos Paulo - Periodontite', 'start_date'=>'2018-12-05 09:30:00',
                 'end_date'=>'2018-12-05 10:00:00', 'color'=>'red'],
            ['id'=>3, 'text'=>'Jefferson Pereira - Restauração', 'start_date'=>'2018-12-05 10:30:00',
                 'end_date'=>'2018-12-05 11:00:00', 'color'=>'yellow'],
            ['id'=>4, 'text'=>'José Paulo - Manuntenção', 'start_date'=>'2018-12-05 11:00:00',
                 'end_date'=>'2018-12-05 11:30:00', 'color'=>'orange'],
            ['id'=>5, 'text'=>'Ana Paula - Manutenção', 'start_date'=>'2018-12-05 11:30:00',
                 'end_date'=>'2018-12-05 12:00:00', 'color'=>'blue'],
            ['id'=>6, 'text'=>'Pedro Augusto - Manutenção', 'start_date'=>'2018-12-06 08:00:00',
                 'end_date'=>'2018-12-06 08:30:00', 'color'=>'red'],
                 ['id'=>7, 'text'=>'João Augusto - Manutenção', 'start_date'=>'2018-12-06 08:30:00',
                 'end_date'=>'2018-12-06 09:00:00', 'color'=>'black'],
                 ['id'=>8, 'text'=>'Carlos Robert - Manutenção', 'start_date'=>'2018-12-06 10:00:00',
                 'end_date'=>'2018-12-06 10:30:00', 'color'=>'orange'],
                 ['id'=>9, 'text'=>'Pedro Vicente - Manutenção', 'start_date'=>'2018-12-06 10:30:00',
                 'end_date'=>'2018-12-06 11:30:00', 'color'=>'green'],
                 ['id'=>10, 'text'=>'Marcos Paulo - Manutenção', 'start_date'=>'2018-12-06 11:30:00',
                 'end_date'=>'2018-12-06 12:00:00', 'color'=>'blue'],
                 ['id'=>11, 'text'=>'Jéssica Marques - Manutenção', 'start_date'=>'2018-12-06 12:00:00',
                 'end_date'=>'2018-12-06 12:30:00', 'color'=>'purple'],
                
                 ['id'=>12, 'text'=>'Jonas Paulo - Manutenção', 'start_date'=>'2018-12-08 09:30:00',
                 'end_date'=>'2018-12-08 10:00:00', 'color'=>'green'],
                 ['id'=>13, 'text'=>'Esther Ferreira - Manutenção', 'start_date'=>'2018-12-08 10:30:00',
                 'end_date'=>'2018-12-08 11:00:00', 'color'=>'blue'],
                 ['id'=>14, 'text'=>'João Augusto - Restauração', 'start_date'=>'2018-12-08 11:30:00',
                 'end_date'=>'2018-12-08 12:00:00', 'color'=>'pink'],*/
                 ['id'=>15, 'id_cliente'=>1, 'text'=>'Marcos Justos - Limpeza', 'start_date'=>'2018-12-08 12:30:00',
                 'end_date'=>'2018-12-08 13:00:00', 'color'=>'black'],
                 ['id'=>16, 'id_cliente'=>2, 'text'=>'Keven Konan - Manutenção', 'start_date'=>'2018-12-08 13:30:00',
                 'end_date'=>'2018-12-08 14:00:00', 'color'=>'purple'],
        ]);
    }
}
