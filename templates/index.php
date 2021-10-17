<?php

// Bildobjekt aus Originaldatei erstellen

$bigImage=imageCreateFromJPEG('static/jacket.png');



// Breite und Höhe ermitteln

$bigWidth = imageSX($bigImage);

$bigHeight = imageSY($bigImage);



// Wenn Breite Grösse 100

if ($bigWidth > 100) {

   // neue Breite festlegen

   $smallWidth = 100;

   // neue Höhe im Verhältnis zur Breite rechnen

   $smallHeight=intval($bigHeight*$smallWidth/$bigWidth);

   // neues Bildobjekt mit der neuen Höhe und Breite erstellen

   $smallImage=imageCreateTrueColor($smallWidth,$smallHeight);

   /** Kopiert den Inhalt des Originalbildes in das neue Bildobjekt

    * ImageCopyResampled(Zielbild: dst_image,

    *                  Originalbild: src_image,

    *                  Zielkoordinaten: dst_x / dst_y,

    *                  Ursprungskoordinate: src_x / src_y,

    *                  Breit und Höhe Zielrechteck: dst_w / dst_h,

    *                  Breite und Höhe der Quellrechteck: src_w / src_h);

    */

   imageCopyResampled($smallImage,$bigImage,0,0,0,0,$smallWidth,$smallHeight,$bigWidth,$bigHeight);

   // Bildobjekt als JPG speichern

   imageJpeg($smallImage,'static/jacket.png');

}

// GD Bildobjekte löschen

imageDestroy($bigImage);

imageGestroy($smallImage);

?>