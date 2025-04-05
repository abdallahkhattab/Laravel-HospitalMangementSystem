<?php

namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateInvoice implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $patient;
    public $invoice_id;
    public $message;
    public $doctor_id;

    public $created_at;
    public function __construct($data)
    {
        $patient = Patient::find($data['patient']);
        $this->patient = $patient;
        $this->invoice_id = $data['invoice_id'];
        $this->doctor_id = $data['doctor_id'];
        $this->message = "new invoice";
        $this->created_at = date('Y-m-d H:i:s');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('create-invoice'.$this->doctor_id),
           //'create-invoice'
        ];
    }

    public function broadcastAs()
    {
        return 'create-invoice';
    }
}
