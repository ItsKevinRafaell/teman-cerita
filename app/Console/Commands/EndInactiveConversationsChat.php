<?php

namespace App\Console\Commands;

use App\Models\Conversation;
use Illuminate\Console\Command;

class EndInactiveConversationsChat extends Command
{
    protected $signature = 'conversations:end-inactive';
    protected $description = 'End conversations that have been inactive for 1 hour.';

    public function handle()
    {
        $inactiveConversations = Conversation::inactiveFor(1)->get();

        foreach ($inactiveConversations as $conversation) {
            $conversation->update(['status' => 0]);
            $this->info("Ended conversation: {$conversation->id}");
        }

        $this->info('Inactive conversations have been ended.');
    }
}