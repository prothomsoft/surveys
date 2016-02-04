<?php

require_once("../../model/SigmaPictureDao.inc.php");
require_once("../../model/SigmaPictureBean.inc.php");
require_once("../../model/SigmaDao.inc.php");
require_once("../../model/components/images.inc.php");

// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    
    $SigmaId = $_POST['SigmaId'];
    $objImages = new Images();
    $pictureRandomId = $objImages->generatePictureId();
    
    
    
    $tempFile   = $_FILES['Filedata']['tmp_name'];
    $targetFile =  '../../upload/'.$pictureRandomId.'.jpg';
    
    $fileParts = pathinfo($_FILES['Filedata']['name']);
    if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

        // Save the file
        if(move_uploaded_file($tempFile,$targetFile)) {
            //$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
            //$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 140, 140, '../../upload');
            //$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 0, 0, '../../upload');  
            $objSigmaPictureDao = new SigmaPictureDao();
            $objSigmaPictureBean = new SigmaPictureBean();
            $objSigmaPictureBean->setImgDriveName($pictureRandomId.'.jpg');
            $objSigmaPictureBean->setSigmaId($SigmaId);
            //if($arr) {
               // $objSigmaPictureBean->setIW($arr[0]);
               // $objSigmaPictureBean->setIH($arr[1]);
            //}
            $objSigmaPictureDao->create($objSigmaPictureBean);
            
            // sets first uploaded pictures as default
            $objSigmaDao = new SigmaDao();
            $objSigmaBean = $objSigmaDao->read($SigmaId);
            if($objSigmaBean->getImgDriveName() == "") {
                $objSigmaBean->setImgDriveName($pictureRandomId.'.jpg');
            }
            $objSigmaDao->update($objSigmaBean);                    
        }

    } else {

        // The file type wasn't allowed
        echo 'Invalid file type.';

    }
}
?>