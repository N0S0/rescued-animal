<?php
require_once('./names.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="サイトポリシーのページです。 | <?php print($groupname); ?>">

  <!-- OGP -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="og:url" content="http://sono-portfolio.work/rescued-animal/site-policy.php" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php print($groupname); ?>のサイトポリシー" />
    <meta property="og:description" content="<?php print($groupname); ?>のサイトポリシーのページです。
  未来都市を拠点に保健所に収容された犬猫を保護し里親様とのご縁結びをさせていただいております。" />
    <meta property="og:site_name" content="<?php print($groupname); ?>" />
    <meta property="og:image" content="http://sono-portfolio.work/rescued-animal/img/friends-1149841_1920.jpg" />
    <!-- end of OGP -->

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modern-css-reset.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JS -->
    <script src="index.js"></script>
    <!-- loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.3/themes/orange/pace-theme-loading-bar.min.css" integrity="sha512-QGIcnkvI+fcgzembaMZBAjfymdMRgwGAXowTkMHeKgduaulVyjnqjbbZ3b6WgGWSmWq2fE47QlmH4twDVOhXiw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.3/pace.min.js" integrity="sha512-TJX3dl0dqF2pUpKKtV60kECO4y8blw4ZPIZNEkfUnFepRKfx4nfiI37IqFa1TEsRQJkPGTIK4BBJ2k/lmsK7HA==" crossorigin="anonymous"></script>
    <title>サイトポリシー | <?php print($groupname); ?></title>
  </head>

<body>
  <div class="container footerFixed">
    <!-- header -->
    <?php require_once('./header.php'); ?>

    <!-- main -->
    <main class="policy-main">
      <div class="site-policy site-policy-res">
        <p>「<?php print($groupname); ?>」（以下、当サイトとする）は、<?php print($groupname); ?>（以下、当団体とする）が管理、運営しています。
          当サイトを利用される場合は、ここに記載した条件に準拠いただくものとします。当サイトをご利用いただいた時点で、以下利用条件の全てに同意頂いたものとさせて頂きます。

          当サイトは、お客様の便宜に供する為のものであり、お客様御自身の責任において利用頂く事ができるものとします。
          第三者、または当団体に損害や不利益を与える行為、第三者、または当団体の信用や名誉を損なう行為は禁止とさせて頂きます。
          当サイトに収録・掲載されているコンテンツのレイアウト、デザインおよび構造に関する著作権は当団体に帰属します。画像等ご利用の際には事前に当団体の承諾が必要です。
        </p>
      </div>

    </main>


    <!-- footer -->
    <div class="footer">
      <?php require_once('./footer.php'); ?>
    </div>
  </div><!-- end of container -->
</body>

</html>