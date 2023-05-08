<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::create([
            'name' => 'Samuel Gerges',
            'spec' => 'Backend Developer',
            'desc' => 'Behold place was a multiply creeping creature his domin to thiren open void
                       hath herb divided divide creepeth living shall i call beginning
                       third sea itself set',
            'image' => 'testimonial_img_1.png'
        ]);

        Testimony::create([
            'name' => 'Mina Gerges',
            'spec' => 'Manager',
            'desc' => 'Behold place was a multiply creeping creature his domin to thiren open void
                       hath herb divided divide creepeth living shall i call beginning
                       third sea itself set',
            'image' => 'testimonial_img_2.png'
        ]);

        Testimony::create([
            'name' => 'Ayman Hassan',
            'spec' => 'Dentist',
            'desc' => 'Behold place was a multiply creeping creature his domin to thiren open void
                       hath herb divided divide creepeth living shall i call beginning
                       third sea itself set',
            'image' => 'testimonial_img_3.png'
        ]);

        Testimony::create([
            'name' => 'So3ad Hassan',
            'spec' => 'Backend Developer',
            'desc' => 'Behold place was a multiply creeping creature his domin to thiren open void
                       hath herb divided divide creepeth living shall i call beginning
                       third sea itself set',
            'image' => 'testimonial_img_4.png'
        ]);

        Testimony::create([
            'name' => 'Sameh Yehia',
            'spec' => 'Backend Developer',
            'desc' => 'Behold place was a multiply creeping creature his domin to thiren open void
                       hath herb divided divide creepeth living shall i call beginning
                       third sea itself set',
            'image' => 'testimonial_img_5.png'
        ]);
    }
}
