<?php

use App\Models\User;
use App\Models\AuditLog;

function initials($string)
{
    $string_array = explode(" ", $string);
    if (count($string_array) >= 2) {
        return strtoupper(Str::substr($string_array[0], 0, 1)) . "" . strtoupper(Str::substr($string_array[1], 0, 1));
    } else {
        return strtoupper(Str::substr($string_array[0], 0, 1));
    }
}

if (!function_exists('auditLog')) {
    function auditLog(User $user, string $action_type, string $channel, string $action_performed)
    {
        AuditLog::create([
            'user_id' => $user->id,
            'user' => $user->name,
            'action_type' => $action_type,
            'channel' => $channel,
            'action_perform' => $action_performed,
        ]);
    }
}

if (!function_exists('numberFormat')) {
    function numberFormat($number, $decimal = 0): string
    {

        if ($number > 999) {

            $x = round($number);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('K', 'M', 'B', 'T');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;
        }

        return $number;
    }
}
if (!function_exists('getCoords')) {

    function getCoords($coordinates)
    {
        $coords = [];

        foreach ($coordinates as $key => $value) {
            array_push($coords, ['B' . $key + 1 => $value]);
        }

        return array_flatten($coords);
    }
}

if (!function_exists('array_flatten')) {
    function array_flatten($array)
    {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, array_flatten($value));
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}

   
   

