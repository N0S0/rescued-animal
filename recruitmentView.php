<div class="recruitment-div">
  <?php
  foreach ($getPets as $val) {
    $img = './img/recruitment/' . $val['img_name'];

    $ua = $_SERVER['HTTP_USER_AGENT'];
    $browser = ((strpos($ua, 'iPhone') !== false) || (strpos($ua, 'iPod') !== false) || (strpos($ua, 'Android') !== false));
    if ($browser == true) {
      $browser = 'smartphone';
    }
    if ($browser == 'smartphone') {
      $width = 150;
      $height = 150;
    } else {
      $width = 300;
      $height = 300;
    }
    list($width, $height) = resize($img, $width, $height);
    print('<ul class="recruitment-image">');
    print('<li><img src="' . htmlspecialchars($img) . '" width="' . htmlspecialchars($width) . '" height="' . htmlspecialchars($height) . '" class="recruit-image"></li>');
    print('<li>種別：' . htmlspecialchars($val['breed']) . '</li>');
    print('<li>名前：' . htmlspecialchars($val['name']) . '</li>');
    print('<li>性別：' . htmlspecialchars($val['sex']) . '</li>');
    print('<li>年齢：' . htmlspecialchars($val['age']) . '</li>');
    print('<li>体重：' . htmlspecialchars($val['weight']) . 'kg</li>');
    print('<li>プロフィール：' . htmlspecialchars($val['profile']) . '</li>');

    print('</ul>');
  }

  ?>
</div>