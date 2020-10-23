<?php declare(strict_types=1);

namespace App\Policies;

use App\User;
use App\Event;

final class EventPolicy
{
    public function createScene(User $user, Event $event): bool
    {
        return $this->isAuthorized($user, $event);
    }

    private function isAuthorized(User $user, Event $event): bool
    {
        $history = $event->history;

        return $history->owner_id === $user->id || $history->isPlayer($user);
    }
}
