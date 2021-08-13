<?php

namespace App\Repository;

use App\Models\Event;

interface EventRepositoryInterface
{
    public function __construct(Event $event);
}
