<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Mail\ReminderEvent;
use App\Models\Event;
use App\Repository\DateSetupRepositoryInterface;
use App\Repository\EventRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    private $user, $dateSetup, $event;

    public function __construct(UserRepositoryInterface $user, DateSetupRepositoryInterface $dateSetupRepository, EventRepositoryInterface $eventRepository)
    {
        $this->user = $user;
        $this->dateSetup = $dateSetupRepository;
        $this->event = $eventRepository;
    }

    public function index()
    {
        $events = $this->event->all();
        return view('dashboard.event.index', compact('events'));
    }

    public function create_event($id)
    {
        $user = $this->user->findById($id);
        $dateSetup = $this->dateSetup->all();
        return view('dashboard.event.create', compact('user', 'dateSetup'));
    }

    public function store(StoreEventRequest $request)
    {
        $this->event->create($request->validated());
        return redirect()->route('admin.event.index');
        // $email = $event->user->email;

//        Mail::to($email)
//            ->later($event->reminder_start, new ReminderEvent());
    }

    public function edit(Event $event)
    {
        $dateSetup = $this->dateSetup->all();
        $eventType = $event->dateType->name;
        return view('dashboard.event.edit', compact('dateSetup', 'event', 'eventType'));
    }

    public function update(StoreEventRequest $request, Event $event)
    {
        $this->event->update($request->validated(),$event->id);
        return redirect()->route('admin.event.index');
    }

    public function destroy(Event $event)
    {
        $this->event->delete($event->id);
        return redirect()->route('admin.event.index');
    }
}

