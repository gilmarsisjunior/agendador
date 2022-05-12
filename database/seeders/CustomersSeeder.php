<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <50; $i++){
            \DB::table('customers')->insert([
                ['name'=>'Jefferson  Pereira',
                 'address'=>'Rua de Po222lvo',
                 'email'=>'Perdrada@pereira@gmail.com',
                 'telephone'=>'(73) 988737321'],
                 ['name'=>'Gabriel  Teste',
                 'address'=>'Rua de Polvo22',
                 'email'=>'Gabrieln@pereirssa@gmail.com',
                 'telephone'=>'(73) 988737321'],
            ]);
        }
        
    }
}
