<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['id'=> 1, 'status' => 'Em Análise']);
        Status::create(['id'=> 2, 'status' => 'Em Negociação']);
        Status::create(['id'=> 3, 'status' => 'Em Finalização']);
        Status::create(['id'=> 4, 'status' => 'Arquivado']);
    }
}
