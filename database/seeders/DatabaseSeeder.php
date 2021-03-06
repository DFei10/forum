<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $threads = Thread::factory(5)->create();

        $threads->each(
            fn ($thread) => Reply::factory(5)->create(['thread_id' => $thread->id])
        );
    }
}
