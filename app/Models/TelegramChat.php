<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelegramChat extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'telegram_chats';

    protected $guarded = false;
}
