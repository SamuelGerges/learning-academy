<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Learning Academy',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'city' => 'Cairo,Egypt',
            'address' => 'Ahmed Esmat, Ain Shams',
            'phone' => '01143042965',
            'work_hours' => 'Sun to Thurs 9am to 6pm',
            'email' => 'samoulgerges00@gmail.com',
            'map' =>'<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d28087.231696563114!2d30.694070099999998!3d28.361753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1683226088465!5m2!1sen!2seg" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'facebook' =>'https://www.facebook.com/',
            'twitter' =>'https://www.twitter.com/',
            'instagram' =>'https://www.instagram.com/',
        ]);
    }
}
