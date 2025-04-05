<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    public function scopechekConversation($query,$auth_email,$receiver_email){

        return $query->where('sender_email',$auth_email)
            ->where('receiver_email',$receiver_email)->orwhere('receiver_email',$auth_email)->
            where('sender_email',$receiver_email);

    }

    public function messages(){

        return $this->hasMany(Message::class);
     }
}
