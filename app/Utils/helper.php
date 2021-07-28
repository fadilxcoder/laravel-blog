<?php

if(!function_exists('uri_beautifier'))
{
    function uri_beautifier($value)
    {
        return strtolower(str_replace( ' ', '-', $value));
    }
}
