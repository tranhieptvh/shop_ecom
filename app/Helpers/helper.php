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
    $originName = $file->getClientOriginalName();
    $fileName = pathInfo($originName, PATHINFO_FILENAME);
    $extension = $file->getClientOriginalExtension();
    $fileName = $fileName . '_' . time() . '.' . $extension;
    $path = 'uploads/images/' . $model;
    $file->move(public_path($path), $fileName);

    return $path . '/' . $fileName;
}
