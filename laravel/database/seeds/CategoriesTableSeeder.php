<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'Web applications',
                'icon' => 'fa fa-laptop',
                'content'=>'Design and develop web applications, hosting service, domain, SEO.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => 'Mobile Applications',
                'icon' => 'fa fa-mobile',
                'content'=>'Design and develop mobile applications, publish and app store optimization.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => 'Mobile Games',
                'icon' => 'fa fa-gamepad',
                'content'=>'Design and develop mobile games, publish and app store optimization.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ];
    
    
        DB::table('categories')->insert($categories);
    }
}
