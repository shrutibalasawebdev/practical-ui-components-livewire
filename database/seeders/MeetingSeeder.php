<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meeting::create([
            'title' => 'Sprint Planning',
            'date' => now()->addDays(1),
            'notes' => "- Review last sprint performance\n- Set goals for upcoming sprint\n- Assign tasks to team members",
        ]);

        $this->command->info('Sample meeting created!');
    }
}
