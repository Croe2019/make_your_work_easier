<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\Tag;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::factory()->count(10)->create()->each(fn($document) => 
        Tag::factory()->count(4)->create()->each(fn($tag) => 
            $document->tags()->attach($tag->id)
            )
        );
    }
}
