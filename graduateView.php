<ul class="gallery">
  <?php

  foreach ($graduateImg as $img0) {
    $fileInfo = basename($img0);
    //画像リサイズ
    $size = getimagesize($dir . $fileInfo);
    if (strpos($size['mime'], 'jpeg')) {
      $img1 = imagecreatefromjpeg($dir . $fileInfo);
    } else if (strpos($size['mime'], 'png')) {
      $img1 = imagecreatefrompng($dir . $fileInfo);
    }
    //指定サイズmax200px
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $browser = ((strpos($ua, 'iPhone') !== false) || (strpos($ua, 'iPod') !== false) || (strpos($ua, 'Android') !== false));
    if ($browser == true) {
      $browser = 'smartphone';
    }
    if ($browser == 'smartphone') {
      $width = 150;
      $height = 150;
    } else {
      $width = 200;
      $height = 200;
    }

    //元の画像サイズ
    $originalWidth = imagesx($img1);
    $originalHeight = imagesy($img1);

    //割合計算
    $rate = $originalWidth / $originalHeight;
    $height = ceil($width / $rate);
    if ($rate < 1) {
      $height = $width;
      $width = ceil($width * $rate);
    }

    //画像縮小表示
    print('<li class="gallery-li"><img src="' . $dir . $img0 . '" width="' . $width . '" height="' . $height . '" alt="動物の写真" class="graduate-image"></li>');

    //x列表示、並んだら改行
    $column = 3; //列
    if ($img0 == end($graduateImg)) { //最大枚数の場合は列閉じ
      print('</ul>');
    }
  }