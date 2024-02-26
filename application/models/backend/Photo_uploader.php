<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Photo_uploader extends CI_Model {



    #--------------------------------
    #       end function org_upload;
    #--------------------------------    
    function do_upload($FILES, $sizes) {
        // settings
        $max_file_size = 1024 * 1024; // 1MB
        $valid_exts = array('jpeg', 'jpg', 'png', 'gif','webp');
        $diractory = array('uploads/thumb', 'uploads');
        
        if ($FILES['size'] < $max_file_size) {
            // get file extension
            $ext = strtolower(pathinfo($FILES['name'], PATHINFO_EXTENSION));
            
            if (in_array($ext, $valid_exts)) {
                /* resize image */
                $k = 0;
                foreach ($sizes as $w => $h) {
                    $files[] = $this->resize($w, $h, $FILES, $diractory[$k]);
                    $k++;
                }
                
            } else {

                $files['msg'] = $msg = 'Unsupported file';

            }

        } else {

            $files['msg'] = $msg = 'Please upload image smaller than 1MB';

        }

        return $files;
    }

   
    #------------------------------------------------- 
    # end function pb_delete_temp;
    function resize($width, $height, $FILES, $diractory) {

        $sssss = $FILES['size'] / 1024;
        list($w, $h) = getimagesize($FILES['tmp_name']);
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);

        $ext = explode(".", $FILES['name']);
        $string = str_replace(' ', '-', $ext[0]);

        $path = $diractory . '/' . $string . '.' . end($ext);

        if ($sssss < 100 && ($diractory == 'uploads')) {
            copy($FILES['tmp_name'], $path);
        }

        /* read binary data from image file */
        $imgString = file_get_contents($FILES['tmp_name']);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
        
        /* Save image */
        switch ($FILES['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                break;
            case 'image/gif':
                imagegif($tmp, $path, 0);
                break;
            case 'image/webp':
                imagegif($tmp, $path, 0);
                break;
            default:
                exit;
                break;
        }
        return $path;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
    }

}
