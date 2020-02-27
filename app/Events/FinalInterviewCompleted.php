<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\PusherNotification;
use App\Models\FinalInterview;

class FinalInterviewCompleted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $count;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(FinalInterview $fin)
    {
        // insert to pusher_notifications table
        $notif['applicant_id'] = $fin->applicant_id;
        $notif['full_name'] = $fin->applicant->person->name();
        $notif['applied_for'] = $fin->applicant->job->name;
        $notif['procedure_url'] = route('applications.procedure',['applicant_id'=>$fin->applicant_id]);
        PusherNotification::create($notif);

        $this->count = PusherNotification::count();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs(){
        return 'my-event';
    }
}
