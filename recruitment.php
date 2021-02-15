<?php
require_once('./DB_recruitment.php');
require_once('./names.php');
require_once('./resize.php');

if (isset($_GET['dogs']) == 'dogs') {
  $select = 'dogs';
} else if (isset($_GET['cats']) == 'cats') {
  $select = 'cats';
} else {
  $select = 'all';
}

if ($select == 'all') {
  $getPets = getPets();
} else if ($select == 'dogs') {
  $getPets = getDogs();
} else if ($select == 'cats') {
  $getPets = getCats();
}


//ページネーション設定
$perPage = 6; //ページあたりの最大画像数
$imgs = count($getPets);
// var_dump($imgs);//28コ
$maxPage = ceil($imgs / $perPage);
// var_dump($maxPage);//float(5)
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = (int) $_GET['page'];
}

$startNo = ($page - 1) * $perPage;
$img = array_slice($getPets, $startNo, $perPage, true);
//画像表示
$i = 0;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="家族募集中の子たちのページです。 | <?php print($groupname); ?>">

  <!-- OGP -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="og:url" content="http://sono-portfolio.work/rescued-animal/recruitment.php" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php print($groupname); ?>の家族募集中の子たち" />
    <meta property="og:description" content="<?php print($groupname); ?>の家族募集中の子たちのページです。
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
    <title>家族募集中の子たち | <?php print($groupname); ?></title>
  </head>

<body>
  <div class="container">
    <!-- header -->
    <?php require_once('./header.php') ?>

    <section class="recruitment-message recruitment-page">
      <h2>家族募集中の子たち</h2>
      <p>画像クリックで拡大表示されます</p>
    </section>

    <div class="select">
      <form action="./recruitment.php" method="get" name="select">
        <input type="submit" value="全て" name="all">
        <input type="submit" value="ワンちゃんを探す" name="dogs">
        <input type="submit" value="ネコちゃんを探す" name="cats">
      </form>

    </div>

    <?php require_once('./recruitmentView.php');

    print('<ul class="page">');
    //ページネーション表示
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