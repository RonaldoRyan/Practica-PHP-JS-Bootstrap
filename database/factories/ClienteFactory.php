<?php
namespace Database\Factories;


use App\Models\cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = cliente::class;

    public function definition(): array
    {

        $genero = $this->faker->randomElement(['Femenina', 'Masculino']);
        $edad = $this->faker->numberBetween(13, 80);
        $nombre = ($genero === 'Femenina') ? $this->faker->firstNameFemale() : $this->faker->firstNameMale();

        return [
            'nombre' => $nombre,
            'email' => $this->faker->email,
            'telefono' => $this->faker->phoneNumber,
            'genero' => $genero,
            'edad' => $edad
        ];
    }






    }
