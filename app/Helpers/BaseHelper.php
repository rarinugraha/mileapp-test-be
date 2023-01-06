<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function generateUUID()
{
    return Str::uuid()->toString();
}

function datetimeStd($datetime)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('Y-m-d H:i:s');
}

function datetimeTZ($datetime)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('Y-m-d\TH:i:sO');
}

function apiResponse($message, $data = null)
{
    return response()->json([
        'message' => $message,
        'data' => $data
    ]);
}
