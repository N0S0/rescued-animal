<?php
require_once('./names.php');
//ディレクトリ取得
$dir = './img/graduate/';

//ディレクトリ内の一覧を取得
$graduateImg = scandir($dir);

//jpgとpngだけ取得する関数
function filter($graduateImg)
{
  return (strpos($graduateImg, 'jpg') || strpos($graduateImg, 'png'));
}

$graduateImg = array_filter($graduateImg, 'filter');

//ページネーション設定
$perPage = 6; //ページあたりの最大画像数
$imgs = count($graduateImg);
// var_dump($imgs);//28コ
$maxPage = ceil($imgs / $perPage);
// var_dump($maxPage);//float(5)
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = (int) $_GET['page'];
}
// var_dump($page);

$startNo = ($page - 1) * $perPage;
$graduateImg = array_slice($graduateImg, $startNo, $perPage, true);
//画像表示
$i = 0;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="卒業生たちのページです。 | <?php print($groupname); ?>">

  <!-- OGP -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="og:url" content="http://sono-portfolio.work/rescued-animal/graduate.php" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php print($groupname); ?>の卒業生たち" />
    <meta property="og:description" content="<?php print($groupname); ?>の卒業生たちのページです。
未来都市を拠点に保健所に収容された犬猫を保護し里親様とのご縁結びをさせていただいております。" />
    <meta property="og:site_name" content="<?php print($groupname); ?>" />
    <meta property="og:image" content="http://sono-portfolio.work/rescued-animal/img/friends-1149841_1920.jpg" />
    <!-- end of OGP -->
    <!-- css -->
    <link rel="stylesheet" href="modern-css-reset.css">
    <link rel="stylesheet" href="style.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
    <!-- loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.3/themes/orange/pace-theme-loading-bar.min.css" integrity="sha512-QGIcnkvI+fcgzembaMZBAjfymdMRgwGAXowTkMHeKgduaulVyjnqjbbZ3b6WgGWSmWq2fE47QlmH4twDVOhXiw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.3/pace.min.js" integrity="sha512-TJX3dl0dqF2pUpKKtV60kECO4y8blw4ZPIZNEkfUnFepRKfx4nfiI37IqFa1TEsRQJkPGTIK4BBJ2k/lmsK7HA==" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JS -->
    <script src="index.js"></script>
    <title><?php print($shortname); ?>の卒業生たち | <?php print($groupname); ?></title>
  </head>

<body>
  <div class="container">
    <!-- header -->
    <?php require_once('./header.php'); ?>
    <section class="graduate-message graduate-message-res">
      <h2><?php print($shortname); ?>の卒業生たち</h2>
      <p>画像クリックで拡大表示されます</p>
    </section>

    <?php
    // 画像表示
    require_once('./graduateView.php');

    //ページネーション表示
    print('<ul class="page">');
    if ($page > 1) { //最初以外のページにいる場合は最初のページをリンク表示
      print('<li><a href="./graduate.php?page=1">&laquo; first</a></li>');
    } else if ($page == 1) { //最初のページにいる場合は表示しない
      print('');
    }

    for ($i = 1; $i <= $maxPage; $i++) {
      if ($i == $page) {
        print('<li>' . $i . '</li>');
      } else {
        print('<li><a href="./graduate.php?page=' . $i . '">' . $i . '</a></li>');
      }
    }

    if ($page < $maxPage) { //最後以外のページにいる場合は最後のページをリンク表示
      print('<li><a href="./graduate.php?page=' . $maxPage . '">last &raquo;</a></li>');
    } else if ($page == $maxPage) { //最後のページにいる場合は表示しない
      print('');
    }
    print('</ul>');

    ?>

    <!-- footer -->
    <?php require_once('./footer.php'); ?>

  </div><!-- end of container -->
</body>

</html>