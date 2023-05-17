<?php

namespace App\Http\Managers;

class FlashMessageManager
{
    public static function success($message, $delay = 0)
    {
        session()->flash('success', [
            'message' => $message,
            'delay' => $delay
        ]);
    }

    public static function error($message, $delay = 0)
    {
        session()->flash('error', [
            'message' => $message,
            'delay' => $delay
        ]);
    }
}
