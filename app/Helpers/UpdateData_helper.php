<?php

if (!function_exists('updatePage')) {
    function updatePage($custommodel, $reqId, $data, $msg)
    {
        $custommodel->update($reqId, $data);
        
    }
}
