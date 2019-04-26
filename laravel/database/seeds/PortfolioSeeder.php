<?php

use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolios = [
            [
                'title' => "Max Market",
                'content' => "Max Market is the best website to advertise, buy and sell goods. User can post their notice, and search for products",
                'image' => "images/web-outsourcing.jpg",
                'category_id'=> 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Site HT Active",
                'content' => "HT Active is our website to advertise business of company. Show own products was made by HT Active and introduce all ",
                'image' => "images/shopping-website.jpg",
                'category_id'=> 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Dai Thang Nong",
                'content' => "Dai Thang Nong's website, to provide agricultural products.",
                'image' => "images/cms-site.jpg",
                'category_id'=> 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Song Loi Chua",
                'content' => "SLC is a mobile application which was designed by Bayard Viet Nam base on a famous application, Prions en Eglise an",
                'image' => "images/bds-site.jpg",
                'category_id'=> 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Sixteen Plus",
                'content' => "An application to find friends who have similar habit and interests. Using matching system and directions to find each ",
                'image' => "images/game-cocos.jpg",
                'category_id'=> 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Sat Hach Lai Xe",
                'content' => "All 450 newest questions from Ministry of Transportation to help user pass driving examine. Useful tricks and experience to ",
                'image' => "images/game-unity.png",
                'category_id'=> 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Fiber Racing",
                'content' => "Tap to swing and release to let go. Travel as far as possible using simple one touch controls. Collect coins and unlock ",
                'image' => "images/game-admod.png",
                'category_id'=> 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Age of Demons",
                'content' => "Tap and hold to target the evil trooper, then release to shoot. Aim at the evil trooper's head to score more and get rewards!",
                'image' => "images/cross-platform.jpg",
                'category_id'=> 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ];
    
    
        DB::table('portfolios')->insert($portfolios);
    }
}
