<?php

namespace Database\Factories;

use App\Models\Barber;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barber::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>
            'rating_avrg' => $this->faker->numberBetween($min = 1, $max = 5),
            'phone' => $this->faker->regexify('05]+[0-9]{8}'),
            'salon_name' => $this->faker->e164PhoneNumber,
            'gps_location' => $this->faker->streetAddress
            'wilaya' => $this->faker->state,
            'comune' => $this->faker->city,
            'address' => $this->faker->address,
            'start_price' => $this->faker->numberBetween($min = 100, $max = 1000),
            'profile_img' => $this->faker->url
        ];
    }
}
