<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Genre;
use App\Models\Performer;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    private function genreSeeder($name)
    {
        Genre::create([
            'name' => $name,
        ]);
    }

    private function performerSeeder($name, $description, $youtube_link, $image_source, $genre_id)
    {
        Performer::create([
            'name' => $name,
            'description' => $description,
            'youtube_link' => $youtube_link,
            'image_source' => $image_source,
            'genre_id' => $genre_id,
         ]);
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         Role::create(['name' => 'Admin']);
         Role::create(['name' => 'User']);

         $this->genreSeeder('Rock');
         $this->genreSeeder('Pop');
         $this->genreSeeder('Metal');
         $this->genreSeeder('Hip-hop');

         $this->performerSeeder('Red hot Chili Peppers', 'Red Hot Chili Peppers is een Amerikaanse band die funk, rap, punk en pop combineert met rock. De band is in 1983 opgericht in de Californische stad Los Angeles. De band bestaat tegenwoordig uit Anthony Kiedis, Flea, Chad Smith en John Frusciante.', 'https://www.youtube.com/watch?v=OS8taasZl8k', 'https://oor.nl/media/2021/10/RHCP-CRED-Clara-Balzary.jpg',1);
    }
}
