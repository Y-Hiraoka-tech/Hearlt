<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserToArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $following_data = [
            ['user_id' => 1, 'following_artist_id' => 2], 
            ['user_id' => 2, 'following_artist_id' => 3],
            ['user_id' => 3, 'following_artist_id' => 1], 
        ];
    
        foreach($following_data as $following_values) {
    
            $following = new \App\Models\UserToArtistsFollowing();
            $following->user_id = $following_values['user_id'];
            $following->following_artist_id = $following_values['following_artist_id'];
            $following->save();
    
        }
    }
}
