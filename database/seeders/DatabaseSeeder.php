<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Genre;
use App\Models\Performer;
use App\Models\Festival;
use App\Models\Performance;
use App\Models\Stage;
use App\Models\Timeslot;
use App\Models\Like;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class DatabaseSeeder extends Seeder
{
    use HasRoles;
    private function genreSeeder($name)
    {
        Genre::create([
            'name' => $name,
        ]);
    }

    private function userSeeder($name, $email, $password)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $user->assignRole('User');
    }

    private function performerSeeder($name, $description, $youtubeLink, $imageSource, $genreId)
    {
        Performer::create([
            'name' => $name,
            'description' => $description,
            'youtube_link' => $youtubeLink,
            'image_source' => $imageSource,
            'genre_id' => $genreId,
         ]);
    }

    private function festivalSeeder($name, $description, $long, $lat, $startDateTime, $endDateTime, $userId)
    {
        Festival::create([
            'name' => $name,
            'description' => $description,
            'long' => $long,
            'lat' => $lat,
            'start_datetime' => $startDateTime,
            'end_datetime' => $endDateTime,
            'user_id' => $userId,

        ]);
    }

    private function stageSeeder($name, $long, $lat, $description)
    {
        Stage::create([
            'name' => $name,
            'long' => $long,
            'lat' => $lat,
            'description' => $description,
         ]);
    }

    private function timeslotSeeder($startDateTime, $endDateTime)
    {
        Timeslot::create([
            'start_datetime' => $startDateTime,
            'end_datetime' => $endDateTime,
         ]);
    }

    private function performanceSeeder($performerId, $stageId, $timeslotId)
    {
        Performance::create([
            'performer_id' => $performerId,
            'stage_id' => $stageId,
            'timeslot_id' => $timeslotId,
         ]);
    }

    private function likeSeeder($userId, $performanceId)
    {
        Like::create([
            'user_id' => $userId,
            'performance_id' => $performanceId,
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

         $this->userSeeder('Cedric Lenders','ceelenders@hotmail.com','Wachtwoord123!');
         $this->userSeeder('Patrick','admin@hotmail.com','Wachtwoord123!');
         $this->userSeeder('Tommeke','admin@gmail.com','Wachtwoord123!');
         $this->userSeeder('Sandra','admin@test.com','Wachtwoord123!');
         $this->userSeeder('Dirk','admin@speciaal.com','Wachtwoord123!');
         $this->performerSeeder('Red hot Chili Peppers', 'Red Hot Chili Peppers is een Amerikaanse band die funk, rap, punk en pop combineert met rock. De band is in 1983 opgericht in de Californische stad Los Angeles. De band bestaat tegenwoordig uit Anthony Kiedis, Flea, Chad Smith en John Frusciante.', 'https://www.youtube.com/watch?v=OS8taasZl8k', 'https://oor.nl/media/2021/10/RHCP-CRED-Clara-Balzary.jpg',1);
         $this->festivalSeeder('Rock Werchter', 'Rock Werchter is een pop- en rockfestival dat elk jaar plaatsvindt in het dorpje Werchter, een deelgemeente van het Vlaams-Brabantse Rotselaar. Het Belgische muziekfestival vindt plaats in het laatste weekend van juni of het eerste van juli.',50.969784, 4.686307, '2022-06-28 12:00:00', '2022-07-03 12:00:00', 1);
         $this->stageSeeder('Main Stage',50.969784, 4.686307, 'De hoofdstage van het festival' );  
         $this->timeslotSeeder('2022-06-28 12:00:00', '2022-07-03 12:00:00');
         $this->performanceSeeder(1,1,1);
         $this->performanceSeeder(1,1,1);
         $this->performanceSeeder(1,1,1);
         $this->likeSeeder(2,1);
         $this->likeSeeder(1,1);

    }
}
