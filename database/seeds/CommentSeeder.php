<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('comments')->insert([
            ['user_id' => 1, 'post_id' => 1, 'content' => 'Comment #1 Content' ],
            ['user_id' => 1, 'post_id' => 2, 'content' => 'Comment #2 Content' ],
            ['user_id' => 2, 'post_id' => 1, 'content' => 'Comment #3 Content' ],
            ['user_id' => 1, 'post_id' => 3, 'content' => 'Comment #4 Content' ],
            ['user_id' => 2, 'post_id' => 3, 'content' => 'Comment #5 Content' ],
            ['user_id' => 1, 'post_id' => 3, 'content' => 'Comment #6 Content' ],
            ['user_id' => 2, 'post_id' => 4, 'content' => 'Comment #7 Content' ]
        ]);
    }
}
