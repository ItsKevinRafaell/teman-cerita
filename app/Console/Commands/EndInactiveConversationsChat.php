<?php

namespace App\Console\Commands;

use App\Models\ConversationChat;
use Illuminate\Console\Command;

class EndInactiveConversationsChat extends Command
{
    protected $signature = 'conversations:end-inactive';
    protected $description = 'End conversations that have been inactive for 1 minute';

    public function handle()
    {
        $inactiveConversations = ConversationChat::inactiveFor(1)->get();

        foreach ($inactiveConversations as $conversation) {
            $conversation->update(['status' => 'inactive']);
            $this->info("Ended conversation: {$conversation->id}");
        }

        $this->info('Inactive conversations have been ended.');
    }
}