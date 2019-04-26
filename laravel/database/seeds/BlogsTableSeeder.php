<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = [
    	[
            'user_id' => "1",
    		'title' => "Junior - Senior Developer Wanted",
            'content'=>"Để đáp ứng nhu cầu phát triển, HT Active cần tuyển nhiều vị trí lập trình viên Junior - Senior.",
            'image'=> "https://s3-ap-southeast-1.amazonaws.com/htactive/blogs/components_react_native.png ",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
    	],
    	[
    		'user_id' => "2",
    		'title' => "Những Material component tuyệt vời trong React Native.",
            'content'=>"Những Material component tuyệt vời trong React Native.",
            'image'=> "https://s3-ap-southeast-1.amazonaws.com/htactive/blogs/components_react_native.png ",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
    	],
    	[
    		'user_id' => "2",
    		'title' => "[ReactJS Tutorial] Bài 1 - Tổng quan",
            'content'=>"Bài dịch từ tutorialspoint.com",
            'image'=> "https://s3-ap-southeast-1.amazonaws.com/htactive/blogs/components_react_native.png",
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
    	],
    ];


    DB::table('blogs')->insert($blogs);
      
    }
}
