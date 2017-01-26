<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Blog Seeds
        |--------------------------------------------------------------------------
        |
        | Data dummy of users, categories, tags, articles and comments
        |
        */

        #Creating dummy users
        factory(User::class, 50)->create();

        #Creating dummy categories
        factory(Category::class, 10)->create();

        #Creating dummy tags
        factory(Tag::class, 50)->create();

        #Creating dummy articles with categories and tags
        factory(Article::class, 200)->create()->each(function($article) {
            $article->articleCategories()->saveMany(factory(ArticleCategory::class, 3)->make());
            $article->articleTags()->saveMany(factory(ArticleTag::class, 3)->make());
        });

        #Creating users with comments
        factory(Comment::class, 500)->create();
    }
}
