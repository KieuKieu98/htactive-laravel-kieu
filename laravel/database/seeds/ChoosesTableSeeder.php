<?php

use Illuminate\Database\Seeder;

class ChoosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chooses = [
            [
                'title' => "THE RIGHT TEAM",
                'image' => "images/whychooseus.png",
                'content' => "We love what we do, some might say a bit too much, and we bring enthusiasm and commitment to every project we work on. Put simply, 
                if you want a partner who cares about your business, choose HT Active.",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "WE LISTEN",
                'image' => "images/whychooseus1.jpg",
                'content' => "We listen, we discuss, we advise. We then select the best solution to fit. We don’t shoehorn projects and if we feel we’re not a good fit we’ll be honest and tell you from the outset. 
                We're experienced programmers, we love discussing and planning new projects and have years of knowledge and ex",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "CREATIVE & TECHNICAL",
                'image' => "images/whychooseus2.jpg",
                'content' => "Whether it’s website or application, game..., system development or custom programming, we like to keep everything under one roof to make it easier for our customers. 
                We love nothing more than working on a great project with a fantastic client. We care about our clients and can often be found",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title' => "UNDER ONE ROOF",
                'image' => "images/studio.png",
                'content' => "HT Active is 'one-stop-shop' software solution agency providing everything you need to successfully market your business to customers. 
                Our services include planning and strategy, design and development, building and deploying web applications/mobile application/game belong with graphic design,",
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ];
    
    
        DB::table('chooses')->insert($chooses);
    }
}
