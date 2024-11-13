<?php
// app/Helpers/custom_helper.php

if (!function_exists('getMediaList')) {
    function getMediaList($table, $medaiObj)
    {
        return $mediaArray = [
            'uploaded_file' => $medaiObj->where('delete_status', '0')->orderBy('doc_id', 'Desc')->paginate(21),
            'pagination' => $medaiObj->pager

        ];
    }
}
