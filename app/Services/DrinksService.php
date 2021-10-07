<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class DrinksService
{

    public function getDrinksList($page = 1, $perPage = 25)
    {
        $drinks = [
            ['id' => -1, 'name' => 'Beer'],
            ['id' => -2, 'name' => 'Wine'],
            ['id' => -3, 'name' => 'Soda'],
            ['id' => -4, 'name' => 'Water'],
        ];

        $drinksRequest = Http::get("https://api.punkapi.com/v2/beers", [
            'page' => $page,
            'per_page' => $perPage
        ]);

        if ($drinksRequest->successful()) {
            $drinks = $drinksRequest->json();
        }

        $drinks = collect($drinks)->sortBy('name');

        return $drinks;
    }
}
