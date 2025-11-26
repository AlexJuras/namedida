<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roupa>
 */
class RoupaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = ['vestido', 'terno', 'smoking', 'blazer', 'calça social', 'camisa social', 'gravata', 'colete'];
        $tamanhos = ['PP', 'P', 'M', 'G', 'GG', '36', '38', '40', '42', '44', '46', '48'];
        $cores = ['preto', 'branco', 'azul', 'cinza', 'bege', 'rosa', 'vermelho', 'verde', 'azul marinho'];
        $materiais = ['algodão', 'poliéster', 'seda', 'linho', 'lã', 'viscose', 'cetim'];
        $marcas = ['Reserva', 'Aramis', 'Dudalina', 'Hugo Boss', 'Calvin Klein', 'Tommy Hilfiger', 'Zara', 'Renner'];
        $estados = ['disponivel', 'alugada', 'manutencao'];
        
        return [
            'codigo' => $this->faker->unique()->numberBetween(1000, 9999),
            'tipo' => $this->faker->randomElement($tipos),
            'tamanho' => $this->faker->randomElement($tamanhos),
            'cor' => $this->faker->randomElement($cores),
            'material' => $this->faker->randomElement($materiais),
            'marca' => $this->faker->optional(0.7)->randomElement($marcas),
            'preco' => $this->faker->randomFloat(2, 50, 500),
            'estado' => $this->faker->randomElement(array_slice($estados, 0, 2)), // Apenas disponivel ou alugada
            'observacoes' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}
