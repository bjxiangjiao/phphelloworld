<?php
// Load the original image
$originalImage = imagecreatefromjpeg('./image.jpg');

// Create a transparent watermark layer
$watermark = imagecreatetruecolor(200, 50);
imagesavealpha($watermark, true);
imagefill($watermark, 0, 0, imagecolorallocatealpha($watermark, 0, 0, 0, 127));

// Set font color
$textColor = imagecolorallocate($watermark, 255, 255, 255); // White color

// Add text to the watermark layer
$text = "PHP Watermark";
$font = './arial.ttf'; // Make sure you have the path to this font file
imagettftext($watermark, 20, 0, 10, 40, $textColor, $font, $text);
// Merge the watermark with the original image
imagecopy($originalImage, $watermark, imagesx($originalImage) - 210, imagesy($originalImage) - 60, 0, 0, imagesx($watermark), imagesy($watermark));

// Output and save the result image
header('Content-Type: image/jpeg');
imagejpeg($originalImage, './watermarked_image.jpg', 90);

// Clean up resources
imagedestroy($originalImage);
imagedestroy($watermark);
?>
