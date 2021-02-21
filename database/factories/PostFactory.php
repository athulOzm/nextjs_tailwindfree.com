<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
 

class PostFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     * 
     * 
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(50);
        return [
            'user_id'   =>  $this->faker->randomElement(\App\Models\User::all()->pluck('id')->toArray()),
            'title' =>  $title,
            'slug'  =>  Str::slug($title, '-'),
            'body'  =>  $this->faker->text(400),
            'code'  =>  $this->faker->text(400),
             
        ];
    }
}
