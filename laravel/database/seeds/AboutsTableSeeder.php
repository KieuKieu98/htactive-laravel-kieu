<?php

use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abouts = [
            [
                'title' => "Reliance",
                'icon' => "fa fa-gavel customwidth",
                'content' => "Professional ethics is the number one criteria. For customer, we will always be honest because only the trust and satisfaction of customers bring us success.",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Fast and high quality commitment",
                'icon' => "fa fa-star customwidth",
                'content'=>"We measure our success as a company by how well we achieve, not by the size of our profits.
                 We will do our best to bring you just the satisfied in the fastest way. When the service provider is not good just as committed, HT Active will refund to you. There will always be so.",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "Savings and Efficiency",
                'icon' => "fa fa-usd customwidth",
                'content'=>"We do services not only for the profits, but also by the passion. We’re developers, designers, support specialists and gamers. We all love programing. Our services will savings and efficiency.",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "24/7 Supporting",
                'icon' => "fa fa-weixin customwidth",
                'content'=>"HT Active will always support, serve, and maintain our customer for long term. Beside that, we provide a live chat system, working 24/7, that will help you immediate access to help.",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ];
    
    
        DB::table('abouts')->insert($abouts);
    }
}
