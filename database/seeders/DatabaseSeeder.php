<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar usuário admin
        User::factory()->create([
            'name' => 'alex victor',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('12121212'),
        ]);

        // Criar clientes com pessoas associadas
        \App\Models\Cliente::factory(10)
            ->has(\App\Models\Pessoa::factory()->count(rand(1, 4)), 'pessoas')
            ->create();

        // Criar roupas
        \App\Models\Roupa::factory(30)->create();

        // Criar locações
        \App\Models\Locacao::factory(20)->create();
    }
}
