<?php

namespace App\Repository\Eloquent;

use App\Models\Event;
use App\Repository\EventRepositoryInterface;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{

    public function __construct(Event $event)
    {
        parent::__construct($event);
    }
}
