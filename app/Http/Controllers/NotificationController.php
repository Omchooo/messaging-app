<?php

namespace App\Http\Controllers;

use App\Enums\NotificationType;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notificationText = $this->notificationText();
        $notifications = Notification::latest()
                        ->where('to_user', 1)
                        ->with(['post.media', 'fromUser.media'])
                        ->get();
        // $authUser = Auth::user();
        // dump($authUser->receivedNotifications->toArray());
        // $notifications = $authUser->receivedNotifications;
        
        foreach ($notifications as $notification) {
            $notificationType = $notification->type;
            $sentAt = $notification ? $this->formatTimeDifference($notification->created_at) : null;
            // dump($notification->toArray());
            
            if (isset($notificationText[$notificationType])) {
                $message = $notificationText[$notificationType];
                // $senderId = $notification->from_user;
                if ($notification->post_id) {
                    $notificationImage = $notification->post->getFirstMedia('post')->img('responsive') ?? null;
                }
                // dump("$message - Sender ID: $senderId, Receiver ID: 1");
                // dump($notification->fromUser->getFirstMediaUrl('profile', 'avatar'));

                $allNotifications[] = [
                    'senderId' => $notification->fromUser->id,
                    'senderName' => $notification->fromUser->username,
                    'senderImage' => $notification->fromUser->getFirstMediaUrl('profile', 'avatar'),
                    'message' => $message,
                    'postId' => $notification->post_id,
                    'postImage' => $notificationImage ?? null,
                    'sentAt' => $sentAt ?? null
                ];

            }
        }
        // dump($allNotifications);
        
        return view('notifications.index', compact('allNotifications'));
    }

    public function notificationText()
    {
        return [
            NotificationType::Like->value => 'has liked your post.',
            NotificationType::Follow->value => 'started following you.',
            NotificationType::Comment->value => 'has commented on your post.',
        ];
    }

    function formatTimeDifference(Carbon $dateTime)
    {
        $minutesDiff = $dateTime->diffInMinutes();

        if ($minutesDiff < 1) {
            $secondsDiff = $dateTime->diffInSeconds();
            return $secondsDiff . 's';
        } elseif ($minutesDiff < 60) {
            return $minutesDiff . 'm';
        } else {
            $hoursDiff = $dateTime->diffInHours();

            if ($hoursDiff < 24) {
                return $hoursDiff . 'h';
            } else {
                $daysDiff = $dateTime->diffInDays();
                return $daysDiff . 'd';
            }
        }
    }
}
