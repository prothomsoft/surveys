<?php
class Images {
	
	function generatePictureId() {
		$pictureId = md5(uniqid(rand()));
		return $pictureId;
	}
	
	function ratioResizeImg($filename, $option, $newWidth, $newHeight, $folderName) {
		$filepath = $folderName.'/'.$filename;
		$srcImage = @imagecreatefromjpeg($filepath); 
		if (isset($srcImage)) {
			$srcWidth = imagesx($srcImage); 
			$srcHeight = imagesy($srcImage);
			
			if ($option == 'thumb') {
				if($srcWidth > $srcHeight) {
					$newWidth = 320;
					$newheight = 160;
				} else {
					$newWidth = 160;
					$newheight = 320;
				}
			}
			 
			$ratioWidth = $srcWidth/$newWidth;
			$ratioHeight = $srcHeight/$newHeight;
			if (($ratioWidth > 1) or ($ratioHeight>1)) {
	  			if ( $ratioWidth < $ratioHeight) { 
	    			$destWidth = $srcWidth/$ratioHeight;
	    			$destHeight = $newHeight; 
	  			} else { 
	    			$destWidth = $newWidth; 
	    			$destHeight = $srcHeight/$ratioWidth;
	  			}
			} else {
	  			$destWidth = $srcWidth;
	  			$destHeight = $srcHeight;
			}
	
			$destImage = imagecreatetruecolor($destWidth, $destHeight); 
			imagecopyresampled($destImage, $srcImage, 0, 0, 0, 0, $destWidth, $destHeight, $srcWidth, $srcHeight);
			
			$arr = "";
			
			if ($option == 'thumb') {
				$dest_file = $folderName.'/thumb/'.$filename;
				$arr[0] = $destWidth;
				$arr[1] = $destHeight;
			}
			if ($option == 'proper') {
				$dest_file = $folderName.'/proper/'.$filename;			
			}
			if ($option == 'micro') {
				$dest_file = $folderName.'/micro/'.$filename;			
			}
			imagejpeg($destImage, $dest_file);
			imagedestroy($srcImage);
			imagedestroy($destImage);
			
			return $arr;
		}	
	}
}
?>