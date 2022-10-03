<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if(!Storage::exists('public/documents'))
        {
            Storage::makeDirectory('public/documents');
        }

        return [
            'document_name' => $this->faker->name(),
            'user_id' => 1,
            'document_path' => $this->faker->image(storage_path('app/public/documents'), 640, 480, null, false)
        ];
    }
}
