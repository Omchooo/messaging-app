<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessageNotificationBox extends Component
{
    public $authUser;
    public $visibility = 'hidden';
    public $newNotifications;

    public function mount()
    {
        $this->authUser = auth()->user();
    }

    public function render()
    {
        // dump($this->authUser->id);
        // dump($this->newNotifications);

        return view('livewire.message-notification-box');
    }

    public function closeNotification()
    {
        $this->visibility = 'hidden';
        $this->newNotifications = [];
    }

    public function getListeners()
    {
        return [
            "echo-private:user.chat.box.{$this->authUser->id},NotificationBox" => 'notifyNewMessageBox',
        ];
    }

    public function notifyNewMessageBox($event)
    {
        if ($this->visibility === 'hidden') {
            $this->visibility = '';
        }

        $existingNotificationIndex = collect($this->newNotifications)
            ->search(function ($notification) use ($event) {
                return $notification['sender'] === $event['sender'];
            });

        if ($existingNotificationIndex !== false) {
            $this->newNotifications[$existingNotificationIndex]['count']++;
        } else {
            $notification = [
                'sender' => $event['sender'],
                'chatRoom' => $event['chatRoom'],
                'count' => 1,
            ];
            $this->newNotifications[] = $notification;
        }
    }
}
