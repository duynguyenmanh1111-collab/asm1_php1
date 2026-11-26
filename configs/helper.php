<?php

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            throw new Exception('Không thể tải tệp lên!');
        }

        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
        ];
        $imageInfo = getimagesize($file['tmp_name']);
        if ($imageInfo === false || !isset($allowedTypes[$imageInfo['mime']])) {
            throw new Exception('Chỉ chấp nhận ảnh JPG, PNG, GIF hoặc WEBP!');
        }
        if (($file['size'] ?? 0) > 2 * 1024 * 1024) {
            throw new Exception('Ảnh không được lớn hơn 2MB!');
        }

        $targetDir = PATH_ASSETS_UPLOADS . $folder;
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $extension = $allowedTypes[$imageInfo['mime']];
        $targetFile = $folder . '/' . bin2hex(random_bytes(8)) . '.' . $extension;
        $fullPath = PATH_ASSETS_UPLOADS . $targetFile;

        if (move_uploaded_file($file["tmp_name"], $fullPath)) {
            return $targetFile;
        }

        throw new Exception('Upload file không thành công!');
    }
}

if (!function_exists('delete_file')) {
    function delete_file($relativePath)
    {
        if ($relativePath === '' || $relativePath === null) {
            return;
        }
        $relativePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);
        $fullPath = realpath(PATH_ASSETS_UPLOADS . $relativePath);
        $uploadRoot = realpath(PATH_ASSETS_UPLOADS);
        if ($fullPath && $uploadRoot && str_starts_with($fullPath, $uploadRoot) && is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}

if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}