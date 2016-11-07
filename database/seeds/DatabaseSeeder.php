<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users',
        'posts',
        'comments',
        'tags',
        'categories',
        'post_tag'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateAll();

        $this->call(UserTableSeeder::class);

        $this->call(DummyDataSeeder::class);
    }

    private function truncateAll()
    {
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
    }
}
