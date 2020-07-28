<?php

if (! function_exists('studlyToText')) {
    function studlyToText(string $studlyText): string
    {
        return trim(preg_replace('/[A-Z]/', ' $0', $studlyText));
    }
}
