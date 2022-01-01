<?php

use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

if (!function_exists('str')) {
    function str(string $content): Stringable
    {
        return Str::of($content);
    }
}
