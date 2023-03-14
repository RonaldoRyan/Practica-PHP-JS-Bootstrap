<?php

namespace Database\Factories;
use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = producto::class;

    public function definition(): array
    {

        return [
        'marca' => $this->faker->unique()->company(),
        'estilo' => $this->faker->randomElement(['casual', 'formal', 'deportivo']),
        'precio'  => $this->faker->randomFloat(2, 10, 1000),
         'talla'=>$this->faker->randomElement(['S', 'M', 'L', 'XL']),
        ];
    }
}
