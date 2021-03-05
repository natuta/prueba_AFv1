<?php

namespace Database\Factories;

use App\Models\Contacto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contacto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'direccion'=>$this->faker->address,
            'celular'=> $this->faker->phoneNumber,
            'telefono' => $this->faker->phoneNumber,
            'email_personal'=> $this->faker->email,
        ];
    }
}
