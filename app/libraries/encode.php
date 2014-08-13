<?php

class Encode {

    public static function email($e) {
        $output = '';
        for ($i = 0; $i < strlen($e); $i++) {
            $output .= '&#'.ord($e[$i]).';';
        }
        return $output;
    }

    public static function email2image($email) {
        $emaildir = 'content/email';
        $storage = PATH . $emaildir . DS;


        if(!is_dir($storage)) mkdir($storage);
        $filename = hash('md5', $email) . '.png';

        $filepath = $storage . $filename;
        $uri = base_url($emaildir . '/' . $filename);


        if (!file_exists($filepath)) {

            $font = 2;
            $width  = ImageFontWidth($font) * strlen($email);
            $height = ImageFontHeight($font);

            $im = @imagecreate($width,$height);

            // White background and blue text
            $bg = imagecolorallocate($im, 255, 255, 255);
            $textcolor = imagecolorallocate($im, 0, 0, 0);


            // Write the string at the top left
            imagestring($im, $font, 0, 0, $email, $textcolor);

            //return $storage . $filename;
            if (imagepng($im, $filepath)) {
                return $uri;
            }
        } else {
            return $uri;
        }

        return false;
    }

}
