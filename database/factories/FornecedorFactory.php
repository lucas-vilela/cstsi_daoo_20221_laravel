<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;//nao eh obrigatorio pois fornecedor ja possui trait hasFactory
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'=>$this->faker->word(),
            'endereco'=>$this->faker->sentence(3).',nr: '
                .$this->faker->randomNumber(4).' - '
                .$this->faker->region(),//faker_locale pt_BR /config/app.php
            'cnpj'=>$this->faker->cnpj(),//faker_locale pt_BR
            'telefone'=>$this->faker->cellphoneNumber()//faker_locale pt_BR
        ];
    }
}
