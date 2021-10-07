<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\ReservationTable;
use App\Models\RestaurantTable;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservationTable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reservation_id' => Reservation::factory(),
            'restaurant_table_id' => RestaurantTable::factory()
        ];
    }
}
