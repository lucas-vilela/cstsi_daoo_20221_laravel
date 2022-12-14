<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $seederRegiao = new RegiaoSeeder();
        $seederRegiao->run();
        (new EstadoSeeder)->run();

        \App\Models\Fornecedor::factory(5)
            ->hasProdutos(fake()->numberBetween(3, 9))
            ->create();
    }
}
