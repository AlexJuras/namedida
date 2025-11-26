<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locacao>
 */
class LocacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataLocacao = $this->faker->dateTimeBetween('-30 days', 'now');
        $dataDevolucao = $this->faker->optional(0.7)->dateTimeBetween($dataLocacao, '+15 days');
        
        $estados = ['ativa', 'concluida', 'atrasada'];
        // Define estado baseado na data de devolução
        if ($dataDevolucao) {
            $estado = $dataDevolucao < now() ? 'concluida' : 'ativa';
        } else {
            $estado = $this->faker->randomElement(['ativa', 'atrasada']);
        }
        
        return [
            'pessoa_id' => \App\Models\Pessoa::factory(),
            'roupa_id' => \App\Models\Roupa::factory(),
            'data_locacao' => $dataLocacao,
            'data_devolucao' => $dataDevolucao,
            'valor_total' => $this->faker->randomFloat(2, 100, 800),
            'estado' => $estado,
            'observacoes' => $this->faker->optional(0.4)->sentence(),
        ];
    }
}
