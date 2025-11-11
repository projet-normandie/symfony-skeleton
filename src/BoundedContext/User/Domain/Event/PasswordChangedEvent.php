<?php

namespace App\BoundedContext\User\Domain\Event;

use App\BoundedContext\User\Domain\Entity\User;
use Symfony\Contracts\EventDispatcher\Event;

class PasswordChangedEvent extends Event
{
    public function __construct(
        private readonly User $user
    ) {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
