<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSetting>
 */
class UserSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // ディレクトリがなければ作成する
        if(!Storage::exists('public/profile_image')){
            Storage::makeDirectory('public/profile_image');
        }

        return [
            'user_id' => 1,
            'user_name' => 'user01',
            'user_profile_image' => $this->faker->image(storage_path('app/public/profile_image'),
            640,480, null, false),
            'user_status' => 1,
            'updated_at' => now(),
            'created_at' => now()
        ];
    }
}
