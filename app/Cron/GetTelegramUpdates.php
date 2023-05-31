<?php

namespace App\Cron;

use App\Models\TelegramChat;
use NotificationChannels\Telegram\TelegramUpdates;

class GetTelegramUpdates
{
    public function __invoke()
    {
        $lastUpdateId = TelegramChat::select('update_id')->orderByDesc('update_id')->first()->update_id;

        $updates = TelegramUpdates::create()
            ->options([
                'offset' => $lastUpdateId + 1,
            ])
            ->get();

        if ($updates['ok']) {
            foreach ($updates['result'] as $result) {
                if (isset($result['message'])) {
                    TelegramChat::UpdateOrCreate(
                        [
                            'message_chat_id' => $result['message']['chat']['id']
                        ],
                        [
                            'update_id' => $result['update_id'],
                            'message_chat_username' => $result['message']['chat']['username']
                        ]
                    );
                }
            }
        }
    }
}
