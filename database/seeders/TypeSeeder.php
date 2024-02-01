<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Database Development',
                'description' => 'Sviluppo di database destinati ad applicativi web',
            ],
            [
                'name' => 'Frontend Development',
                'description' => 'Sviluppo applicazioni lato browser/utente',
            ],
            [
                'name' => 'Web Development',
                'description' => 'Sviluppo web comprendente Frontend e Backend.',
            ]
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->fill($type);
            $newType->save();
        }
    }
}
