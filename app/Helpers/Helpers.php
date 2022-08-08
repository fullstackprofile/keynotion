<?php
if (! function_exists('arrayToObject')) {
    function arrayToObject(array $data): object
    {
        return json_decode(json_encode($data));
    }
}
