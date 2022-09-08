<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'=>$this->faker->word(),
            'descricao'=>$this->faker->paragraph(4),
            'qtd_esotque'=>$this->faker->randomNumber(5),
            'preco'=>$this->faker->randomFloat(2,100,15000),
            'importado'=>$this->faker->boolean()
        ];
    }
}
