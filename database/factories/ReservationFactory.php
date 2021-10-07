<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\RestaurantTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::first(),
            'people' => $this->faker->numberBetween(2, 10),
            'date_time' => $this->faker->dateTimeBetween('+2 hours', '+14 days'),
            'duration' => floor($this->faker->numberBetween(2, 6) / 2) * 2,
        ];
    }
}
