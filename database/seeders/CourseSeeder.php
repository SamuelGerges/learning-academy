<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'category_id' => 1,
            'trainer_id' => 1,
            'name' => 'C++',
            'small_desc' => 'Basic C++',
            'description' => 'Explain Basic C++',
            'price' => 222,
        ]);

        Course::create([
            'category_id' => 1,
            'trainer_id' => 1,
            'name' => 'PHP',
            'small_desc' => 'Basic PHP ',
            'desc' => 'Explain Basic PHP',
            'price' => 222,
        ]);

        Course::create([
            'category_id' => 1,
            'trainer_id' => 1,
            'name' => 'Python',
            'small_desc' => 'Basic Python',
            'desc' => 'Explain Basic Python',
            'price' => 222,
        ]);

        Course::create([
            'category_id' => 1,
            'trainer_id' => 1,
            'name' => 'JAVA',
            'small_desc' => 'Basic JAVA ',
            'desc' => 'Explain Basic JAVA',
            'price' => 222,
        ]);
    }
}
