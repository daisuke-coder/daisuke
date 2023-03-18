<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['post'=>'ex01','name'=>'aaa'],
            ['post'=>'ex02','name'=>'bbb']
        ]);
    }


}
?>
