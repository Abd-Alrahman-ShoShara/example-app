<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory(5)->create()->each(function ($user) {
        $user->profile()->create([
            'bio' => 'This is bio for ' . $user->name,
        ]);

        $posts = $user->posts()->createMany([
            ['title' => 'Post 1', 'body' => 'Body 1'],
            ['title' => 'Post 2', 'body' => 'Body 2'],
        ]);

        $tags = Tag::factory()->count(3)->create();
        foreach ($posts as $post) {
            $post->tags()->attach($tags->pluck('id')->toArray());
        }
    });
    }
}
