<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'endereco' => $this->faker->address(),
            'data_nascimento' => $this->faker->optional(0.7)->date('Y-m-d', '-18 years'),
            'observacoes' => $this->faker->optional(0.5)->sentence(10),
        ];
    }
}
