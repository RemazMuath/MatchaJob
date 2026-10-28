<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Source::firstOrCreate(
            ['name' => 'Jadarat'],
            ['type' => 'website', 'url' => 'https://jadarat.sa/Jadarat/ExploreJobs?Tab=1']
        );

        Source::firstOrCreate(
            ['name' => 'People'],
            ['type' => 'website', 'url' => 'https://people-ksa.com/']
        );

        Source::firstOrCreate(
            ['name' => 'Wadhefa'],
            ['type' => 'website', 'url' => 'https://www.wadhefa.com/']
        );

        Source::firstOrCreate(
            ['name' => 'Tanqeeb'],
            ['type' => 'website', 'url' => 'https://sa.tanqeeb.com/']
        );
    }
}
