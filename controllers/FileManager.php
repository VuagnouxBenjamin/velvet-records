<?php 
namespace controllers; 

class FileManager {
    private $authorised_types = ["image/gif", "image/jpeg", "image/pjpeg", "image/png"]; 

    public function check_img($input_name, $image_name)
    {
        // initialising finfo
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES[$input_name]["tmp_name"]);
        finfo_close($finfo);

        // getting extension. 
        $path_parts = pathinfo($_FILES[$input_name]['name']);
        $extension = $path_parts['extension']; 

        // checking extension
        if (in_array($mimetype, $this->authorised_types))
        {
            move_uploaded_file($_FILES[$input_name]["tmp_name"], $_SERVER["DOCUMENT_ROOT"].'/public/images/'.$image_name.'.'.$extension);
            return $image_name.'.'.$extension;
        } 
        else 
        {
            return false; 
        }    
    }
}
