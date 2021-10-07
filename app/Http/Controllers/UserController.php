<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\RestaurantTable;
use App\Services\DateTimeService;
use App\Services\DrinksService;
use App\Services\MealsService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected DateTimeService $dateTimeService;
    protected DrinksService $drinksService;
    protected MealsService $mealsService;

    /**
     * UserController constructor.
     * @param DateTimeService $dateTimeService
     * @param DrinksService $drinksService
     */
    public function __construct(DateTimeService $dateTimeService, DrinksService $drinksService, MealsService $mealsService)
    {
        $this->dateTimeService = $dateTimeService;
        $this->drinksService = $drinksService;
        $this->mealsService = $mealsService;
    }

    public function reservation()
    {
        return view('reservation', [
            'dates' => $this->dateTimeService->createDatesArray(14),
            'tables' => RestaurantTable::all()->pluck('table_number', 'id'),
            'drinks' => $this->drinksService->getDrinksList(1, 50),
            'meals' => $this->mealsService->getMealsList('c')
        ]);
    }

    public function reserve()
    {

    }

    public function reservations()
    {
        $reservations = Reservation::with('tables')->where('user_id', '=', Auth::id())->get();

        return view('reservations', [
            'reservations' => $reservations
        ]);
    }
}
