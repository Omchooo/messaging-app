<?php

namespace App\Enums;

enum NotificationType: int
{ //case has to match the id in notification_type table
    case Like = 1;
    case Comment = 2;
    case Follow = 3;
}