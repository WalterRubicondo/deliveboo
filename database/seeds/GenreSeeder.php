<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres =['italiano','asiatico','africano','mexicano'];

        foreach ($genres as  $genre) {
          $genre_obj = new Genre();
          $genre_obj->name = $genre;
          $genre_obj->save();
        }
    }
}
