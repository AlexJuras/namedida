<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sexo = $this->faker->randomElement(['masculino', 'feminino', null]);
        
        return [
            'cliente_id' => \App\Models\Cliente::factory(),
            'nome' => $this->faker->name(),
            'data_nascimento' => $this->faker->date('Y-m-d', '-18 years'),
            'sexo' => $sexo,
            'busto' => $this->faker->randomFloat(2, 70, 120),
            'cintura' => $this->faker->randomFloat(2, 60, 100),
            'quadril' => $this->faker->randomFloat(2, 80, 130),
            'altura' => $this->faker->randomFloat(2, 150, 200),
            'ombro' => $this->faker->randomFloat(2, 35, 55),
            'comprimento_vestido' => $this->faker->optional(0.6)->randomFloat(2, 80, 130),
        ];
    }
}
