<?php

function recursive($data, $parent_id = 0, $level = 0) {
    $result = [];
    foreach ($data as $key => $item) {
        if ($item->parent_id == $parent_id) {
            $item->level = $level;
            $result[] = $item;
            unset($data[$key]);
            $child = recursive($data, $item->id, $level + 1);
            $result = array_merge($result, $child);
        }
    }
    return $result;
}

function handleImage($file, $model) {
    $ext = $file->extension();
    $file_name = $model . '_' . time() . '.' . $ext;
    $path = 'uploads/images/' . $model;
    $file->move(public_path($path), $file_name);

    return $path . '/' . $file_name;
}
