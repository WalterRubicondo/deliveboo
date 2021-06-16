<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurant = Restaurant::all();

      return response()->json([
        'data' => $restaurant,
        'success' => true
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    private function generateSlug(string $name, bool $change = true, string $old_slug = '')
    {
      if (!$change) {
        return $old_slug;
      }
      
      $slug = Str::slug($name, '-');
      $slug_base = $slug;
      $counter = 1;

      $restaurant_with_slug = Restaurant::where('slug', '=', $slug)->first();
      while($restaurant_with_slug) {
        $slug = $slug_base . '-' . $counter;
        $counter++;

        $post_with_slug = Restaurant::where('slug', '=', $slug)->first();
      }

      return $slug;
    }
}
