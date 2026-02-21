<?php

namespace App\Console\Commands;

use App\Models\Notification;
use Illuminate\Console\Command;

class CreateDemoNotification extends Command
{
    protected $signature = 'demo:create-notification';

    protected $description = 'Create a demo notification for testing the notification center';

    public function handle(): int
    {
        $types = [
            'comment' => [
                'commented on your post',
                'replied to your comment',
                'mentioned you in a comment',
            ],
            'like' => [
                'liked your post',
                'liked your comment',
                'loved your article',
            ],
            'follow' => [
                'started following you',
                'is now following your updates',
            ],
            'mention' => [
                'mentioned you in a post',
                'tagged you in a discussion',
                'referenced you in an article',
            ],
        ];

        $names = [
            'Sarah Johnson', 'Michael Chen', 'Emily Davis', 'James Wilson',
            'Jessica Brown', 'David Miller', 'Amanda Garcia', 'Robert Martinez',
            'Lisa Anderson', 'Christopher Lee',
        ];

        $type = array_rand($types);

        $notification = Notification::create([
            'type' => $type,
            'message' => fake()->randomElement($types[$type]),
            'actor_name' => fake()->randomElement($names),
            'actor_avatar' => 'https://i.pravatar.cc/150?u=' . fake()->uuid(),
            'read_at' => null,
        ]);

        $this->info("Created {$type} notification from {$notification->actor_name}");

        return self::SUCCESS;
    }
}
