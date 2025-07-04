<?php

namespace App\Livewire\Chat;

use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use App\Models\Conversation;

class Chatlist extends Component
{

    
    public $conversations;
    public $auth_email;
    public $receviverUser;


    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }


     public function getUsers(Conversation $conversation ,$request){


        if($conversation->sender_email == $this->auth_email){
            $this->receviverUser = Doctor::firstwhere('email',$conversation->receiver_email);
        }

        else{
            $this->receviverUser = Patient::firstwhere('email',$conversation->sender_email);
        }

        if(isset($request)){
            return $this->receviverUser->$request;
        }

     }


   public function render()
    {
        $this->conversations = Conversation::where('sender_email',$this->auth_email)->orwhere('receiver_email')
            ->orderBy('created_at','DESC')
            ->get();
        return view('livewire.chat.chatlist');
    }
}
