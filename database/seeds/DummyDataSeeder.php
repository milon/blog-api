<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Carbon\Carbon;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Tag::class, 20)->create();
        factory(Category::class, 10)->create();
        factory(Post::class, 50)->create();
        factory(Comment::class, 250)->create();

        for($i=0; $i < 200; $i++) {
            DB::table('post_tag')->insert([
                'post_id' => rand(1, 50),
                'tag_id'  => rand(1, 20),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
