<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Tech Conference 2025',
                'date' => Carbon::parse('2025-06-15'),
                'venue' => 'Expo Center, New York',
                'available_seats' => 100,
            ],
            [
                'name' => 'Art & Culture Fest 1',
                'date' => Carbon::parse('2025-07-10'),
                'venue' => 'City Hall, Los Angeles 1',
                'available_seats' => 80,
            ],
            [
                'name' => 'Art & Culture Fest 2',
                'date' => Carbon::parse('2025-07-10'),
                'venue' => 'City Hall, Los Angeles 2',
                'available_seats' => 80,
            ],
            [
                'name' => 'Art & Culture Fest 3',
                'date' => Carbon::parse('2025-07-10'),
                'venue' => 'City Hall, Los Angeles 3',
                'available_seats' => 80,
            ],
            [
                'name' => 'Art & Culture Fest 4',
                'date' => Carbon::parse('2025-07-10'),
                'venue' => 'City Hall, Los Angeles 4',
                'available_seats' => 80,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
