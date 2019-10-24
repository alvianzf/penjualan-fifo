<?php

if (! function_exists('human_time')) {
    function human_time($time)
    {
        return Date('d M Y', $time);
    }
}