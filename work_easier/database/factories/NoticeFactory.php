<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // ディレクトリがなければ作成する
        if(!Storage::exists('public/images')){
            Storage::makeDirectory('public/images');
        }

        return [
            'content' => $this->faker->realText(100),
            'image_path' => $this->faker->image(storage_path('app/public/images'),
            640,480, null, false),
            'user_id' => 1,
            'updated_at' => now(),
            'created_at' => now()
        ];
    }
}
