<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Database\Factories\ArticleTagFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('article_tag')->insert([
                'article_id' => Article::all()->random()->id,
                'tag_id' => Tag::all()->random()->id
            ]);
        }
    }
}
