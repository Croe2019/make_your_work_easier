<?php

namespace Database\Seeders;

use Database\Factories\ImageFactory as FactoriesImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\ImageFactory;
use App\Models\Notice;
use App\Models\Image;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notice::factory()->count(10)->create()->each(fn($notice) => 
            Image::factory()->count(4)->create()->each(fn($image) => 
                $notice->images()->attach($image->id)
            )
        );
    }
}
