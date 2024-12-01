<?php

class File
{

    protected static $valid_ext = ['png', 'jpg', 'jpeg'];
    protected static $valid_mime = ['image/png', 'image/jpeg'];

    public static function upload($file)
    {


        if ($file['error'] != 0) {
            return false;
        }

        $name = Sanitizer::sanitize($file['name']);
        $array_name = explode('.', $name);
        $ext = end($array_name);
        if (!in_array($ext, self::$valid_ext)) {
            return false;
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        if (!in_array($mime, self::$valid_mime)) {
            return false;
        }
        $result = $file['size'] <= (10 * 1024 * 1024);
        if (!$result) {
            return false;
        }
        $new_name = time() . '.' . $ext;
        $path = 'upload/image/' . $new_name;
        if (!move_uploaded_file($file['tmp_name'], $path)) {
            return false;
        } else {
            return $path;
        }
    }
    public static function delete($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
        return true;
    }
}
