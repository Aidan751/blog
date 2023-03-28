<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $author3 = User::create([
            'name' => 'Edoardo',
            'email' => 'edoardo@gmail.com',
            'password' => bcrypt('password'),
        ]);


        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = $author1->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'slug' => 'we-relocated-our-office-to-a-new-designed-garage',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
            'category_id' => $category1->id,
            'featured' => 'posts/1.jpg',
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'slug' => 'top-5-brilliant-content-marketing-strategies',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
            'category_id' => $category2->id,
            'featured' => 'posts/2.jpg',
        ]);

        $post3 = $author3->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'slug' => 'best-practices-for-minimalist-design-with-example',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
            'category_id' => $category3->id,
            'featured' => 'posts/3.jpg',
        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'slug' => 'congratulate-and-thank-to-maryam-for-joining-our-team',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
            'category_id' => $category2->id,
            'featured' => 'posts/4.jpg',
        ]);

        $post5 = $author1->posts()->create([
            'title' => 'New published books to read by a product designer',
            'slug' => 'new-published-books-to-read-by-a-product-designer',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
            'category_id' => $category1->id,
            'featured' => 'posts/5.jpg',
        ]);

        $tag1 = Tag::create([
            'tag' => 'Job'
        ]);

        $tag2 = Tag::create([
            'tag' => 'Customers'
        ]);

        $tag3 = Tag::create([
            'tag' => 'Record'
        ]);

        $tag4 = Tag::create([
            'tag' => 'Progress'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag4->id]);
        $post3->tags()->attach([$tag3->id, $tag4->id]);
        $post4->tags()->attach([$tag2->id, $tag3->id]);
        $post5->tags()->attach([$tag1->id, $tag4->id]);
    }
}