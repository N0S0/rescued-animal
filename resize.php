<?php

function resize($img, $width, $height)
{
  $size = getimagesize($img);
  $mime = substr($img, -3);

  if ($mime == 'jpg') {
    $imageData = imagecreatefromjpeg($img);
  } else if ($mime == 'png') {
    $imageData = imagecreatefrompng($img);
  } else if ($mime == 'gif') {
    $imageData = imagecreatefromgif($img);
  }

  $originalW = imagesx($imageData);
  $originalH = imagesy($imageData);

  $rate = $originalW / $originalH;

  if ($originalH < $originalW) { //横長
    $width = $width;
    $height /= $rate;
  } else { //縦長
    $width *= $rate;
    $height = $height;
  }

  return array($width, $height);
}