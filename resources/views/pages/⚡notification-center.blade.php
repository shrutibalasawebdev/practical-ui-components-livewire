<?php

use App\Models\Notification;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Notification Center')]
class extends Component {

    public ?int $latestLoadedId = null;

    public int $unreadCount = 0;

    public function mount(): void
    {
        $this->latestLoadedId = $this->notifications->first()?->id;
        $this->unreadCount = Notification::whereNull('read_at')->count();
    }

    #[Computed]
    public function notifications(): Collection
    {
        if ($this->latestLoadedId === null) {
            return Notification::latest('id')
                ->limit(100)
                ->get();
        }

        return Notification::latest('id')
            ->where('id', '>', $this->latestLoadedId)
            ->get();
    }

    #[Renderless]
    public function markAsRead(int $notificationId): void
    {
        Notification::where('id', $notificationId)->update(['read_at' => now()]);
        $this->unreadCount = Notification::whereNull('read_at')->count();
    }

    #[Renderless]
    public function markAllAsRead(): void
    {
        Notification::whereNull('read_at')->update(['read_at' => now()]);
        $this->unreadCount = 0;
    }

    public function checkForNew(): void
    {
        $latestId = Notification::latest('id')->value('id');

        if ($latestId && $latestId > $this->latestLoadedId) {
            $this->renderIsland('notifications', mode: 'prepend');
            $this->latestLoadedId = $latestId;
            $this->unreadCount = Notification::whereNull('read_at')->count();
        }
    }
};
?>

<div class="min-h-screen bg-gray-100" wire:poll.10s="checkForNew">
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>

            <div
                class="relative"
                x-data="{ open: false }"
                @keydown.escape.window="open = false"
            >
                <button
                    @click="open = !open"
                    class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full transition-colors">
                    <x-icon.bell/>
                    <span
                        x-cloak
                        x-show="$wire.unreadCount > 0"
                        x-text="$wire.unreadCount > 99 ? '99+' : $wire.unreadCount"
                        class="absolute -top-1 -right-1 flex items-center justify-center min-w-5 h-5 px-1.5 text-xs font-bold text-white bg-red-500 rounded-full"
                    ></span>
                </button>

                <div
                    x-cloak
                    x-show="open"
                    x-transition
                    @click.outside="open = false"
                    class="absolute right-0 mt-2 w-96 bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden z-50">
                    <!-- Header -->
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-900">Notifications</h2>
                        <button
                            @click="$wire.markAllAsRead();$dispatch('mark-all-read')"
                            class="text-sm text-blue-500 hover:text-blue-700 transition-colors"
                        >
                            Mark all as read
                        </button>
                    </div>

                    <!-- Notifications List -->
                    <div class="max-h-96 overflow-y-auto">
                        @island('notifications')
                        <div class="grid animate-slide-down">
                            <div class="min-h-0 overflow-hidden">
                                @foreach($this->notifications as $notification)
                                    <x-notification-item :$notification/>
                                @endforeach
                            </div>
                        </div>
                        @endisland

                        @if($this->notifications->isEmpty())
                            <div class="px-4 py-8 text-center text-gray-500">
                                <x-icon.bell class="w-12 h-12 mx-auto text-gray-300 mb-3"/>
                                <p>No notifications yet</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
