<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
    	[
            'title' => "Web Programing",
    		'content' => "Outsourcing & web design on demand, not only business requirements but also technical requirements and system ",
            'image' => "images/web-outsourcing.jpg",
            'category_id'=> 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
    	],
    	[
    		'title' => "Shopping website",
    		'content' => "Generate a shopping website base on existing template with the best price.",
            'image' => "images/shopping-website.jpg",
            'category_id'=> 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
    	],
    	[
    		'title' => "Portal",
    		'content' => "Design and develop CMS sites, Portals for education, business, medical...",
            'image' => "images/cms-site.jpg",
            'category_id'=> 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],
        [
    		'title' => "Real estate",
    		'content' => "Design and develop Websites for finding houses, real estate, house for rent...",
            'image' => "images/bds-site.jpg",
            'category_id'=> 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],
        [
    		'title' => "Game with cocos2d",
    		'content' => "Design, develop, publish, advertise mobile game in Cocos game engine.",
            'image' => "images/game-cocos.jpg",
            'category_id'=> 2,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],
        [
    		'title' => "Game with Unity",
    		'content' => "Design, develop, publish, advertise mobile game in Unity game engine.",
            'image' => "images/game-unity.png",
            'category_id'=> 2,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],
        [
    		'title' => "Integration with 3rd",
    		'content' => "Integrate game with advertise, social network, IAP... Publish game in IOS, Android, Windows Phone store.",
            'image' => "images/game-admod.png",
            'category_id'=> 2,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],
        [
    		'title' => "Cross Platform Application",
    		'content' => "Building mobile applications running on multiple platforms Xamarin, Ionic, ReactNative, NativeScript ...",
            'image' => "images/cross-platform.jpg",
            'category_id'=> 3,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
    	],
    ];


    DB::table('services')->insert($services);
    }
}
