<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = ['YouTube','Facebook','Twitter','Pinterest','LinkedIn','Instagram','WhatsApp','Telegram'];
        foreach ($socials as $social){
            SocialMedia::create([
                'name' => $social,
                'url' => env('APP_URL'),
                'title' => $social
            ]);
        }
    }
}
