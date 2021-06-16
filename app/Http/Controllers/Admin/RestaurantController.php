<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurants = Restaurant::all();

      return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = User::all();

        return view('admin.restaurants.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'desciption' => 'required|string',
            'open_hour' => 'required|date_format:H:i',
            'close_hour' => 'required|date_format:H:i',
            'restaurant_address' => 'required|string|max:100',
            'photo' => 'image|max:100|nullable',
          ]);
    
          $data = $request->all();

          $photo = null;
          if (array_key_exists('photo', $data)) {
            $photo = Storage::put('uploads', $data['photo']);
          }
    
          $restaurant = new Restaurant();
          $restaurant->fill($data);
    
          $restaurant->slug = $this->generateSlug($restaurant->name);
          $restaurant->photo = 'storage/'.$photo;
          $restaurant->save();
    
          return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        return view('admin.restaurants.show')->with('restaurant', $restaurant);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
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
        $request->validate([
            'name' => 'required|string|max:100',
            'desciption' => 'required|string',
            'open_hour' => 'required|date_format:H:i',
            'close_hour' => 'required|date_format:H:i',
            'restaurant_address' => 'required|string|max:100',
            'photo' => 'image|max:100|nullable',
          ]);
    
          $data = $request->all();
    
          $data['slug'] = $this->generateSlug($data['name'], $restaurant->name != $data['name'], $restaurant->slug);

          if (array_key_exists('photo', $data)) {
            $photo = Storage::put('uploads', $data['photo']);
            $data['photo'] = 'storage/'.$photo;
          }
    
          $restaurant->update($data);

          return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index');
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
