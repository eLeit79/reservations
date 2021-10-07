<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class MealsService
{

    public function getMealsList($firstLetter = 'a')
    {
        $meals = [
            ['idMeal' => -1, 'strMeal' => 'Bread'],
            ['idMeal' => -2, 'strMeal' => 'Pasta'],
            ['idMeal' => -3, 'strMeal' => 'Fruit'],
            ['idMeal' => -4, 'strMeal' => 'Vegetables'],
        ];

        $mealsRequest = Http::get("https://www.themealdb.com/api/json/v1/1/search.php", [
            'f' => $firstLetter
        ]);

        if ($mealsRequest->successful()) {
            $meals = $mealsRequest->json()['meals'];
        }

        return collect($meals)->sortBy('strMeal');
    }
}
