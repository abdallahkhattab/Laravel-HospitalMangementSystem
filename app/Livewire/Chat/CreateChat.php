<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateChat extends Component
{
    public $user;

    
    public $auth_email;

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }

    public function createConversation($receiver_email)
    {

        $chek_Conversation = Conversation::chekConversation($this->auth_email, $receiver_email)->get();
        if ($chek_Conversation->isEmpty()) {
            DB::beginTransaction();
            try {
                // $createConversation
                $createConversation = Conversation::create([
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'last_time_message' => null,
                ]);
                // create message
                Message::create([
                    'conversation_id' => $createConversation->id,
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'body' => 'السلام عليكم',
                ]);
                DB::commit();
                $this->emitSelf('render');
            } catch (\Exception $e) {
                DB::rollBack();
            }
        } else {

            dd('Conversation yes');
        }

    }

    public function render()
    {
        if(Auth::guard('patient')->check()){
            $this->user = Doctor::all();
           
        }else{
            $this->user = Patient::all();
        }
        return view('livewire.chat.create-chat')->extends('Dashboard.layout.master');
    }

    
}
