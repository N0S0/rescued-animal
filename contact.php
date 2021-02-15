<?php
session_start();
require_once('./names.php');

$mode = 'input';
$errorMessage = array();
if (isset($_POST['back']) && $_POST['back']) {
  // 何もしない
} else if (isset($_POST['confirm']) && $_POST['confirm']) {
  if (empty($_POST['name'])) {
    $errorMessage[] = '名前を入力してください';
  } else if (mb_strlen($_POST['name']) > 100) {
    $errorMessage[] = '名前は100文字以下で入力してください';
  } else {
    $_SESSION['name'] = htmlspecialchars($_POST['name']);
  }

  if (empty($_POST['tel'])) {
    $_SESSION['tel'] = '';
  } else {
    $_SESSION['tel'] = htmlspecialchars($_POST['tel']);
  }

  if (empty($_POST['email'])) {
    $errorMessage[] = 'emailを入力してください';
  } else if (mb_strlen($_POST['email']) > 200) {
    $errorMessage[] = 'メールアドレスは200文字以下で入力してください';
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errorMessage[] = 'メールアドレスが不正です';
  } else {
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
  }


  if (empty($_POST['message'])) {
    $errorMessage[] = 'お問い合わせ内容を入力してください';
  } else if (mb_strlen($_POST['message']) > 500) {
    $errorMessage[] = 'お問い合わせ内容は500文字以内にしてください';
  } else {
    if (preg_match('/^( |　)+$/', $_POST['message'])) {
      $_SESSION['message'] = '';
    } else {
      $_SESSION['message'] = $_POST['message'];
    }
  }

  if ($errorMessage) {
    $mode = 'input';
  } else {
    $mode = 'confirm';
  }
} else if (isset($_POST['send']) && $_POST['send']) {
  // 送信ボタンを押したとき
  $message = 'お問い合わせを受け付けました。' . PHP_EOL
    . '名前：' . $_SESSION['name'] . PHP_EOL
    . 'tel：' . $_SESSION['tel'] . PHP_EOL
    . 'お問い合わせ内容：' . PHP_EOL
    . $_SESSION['message'];

  mb_send_mail($_SESSION['email'], '【' . $groupname . '】お問い合わせありがとうございます', $message);
  mb_send_mail('snct.h23b09@gmail.com', $groupname . 'です。お問い合わせありがとうございます。', $message);
  $_SESSION = array();

  $mode = 'send';
} else {
  $_SESSION['name'] = '';
  $_SESSION['tel'] = '';
  $_SESSION['email'] = '';
  $_SESSION['message'] = '';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="お問い合わせページです。 | <?php print($groupname); ?>">

  <!-- OGP -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="og:url" content="http://sono-portfolio.work/rescued-animal/contact.php" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php print($groupname); ?>のお問い合わせページ" />
    <meta property="og:description" content="<?php print($groupname); ?>のお問い合わせのページです。
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
    <title>お問い合わせ | <?php print($groupname); ?></title>
  </head>

<body>
  <div class="container">
    <!-- header -->
    <?php require_once('./header.php'); ?>
    <?php if ($mode == 'input') : ?>

      <!-- 入力画面 -->
      <div class="contact-div">
        <h3>お問い合わせ</h3>
        <p>以下のフォームからお問い合わせください</p>
        <?php
          if ($errorMessage) {
            print('<p class="contact-error">' . implode('<br>', $errorMessage) . '</p>');
          }
          ?>
        <div class="contact">
          <form action="./contact.php" method="post">
            <ul class="contact-form">
              <li><label for="name">お名前<span class="mandatory">※必須</span></label></li>
              <li><input type="text" name="name" id="name" value="<?php print($_SESSION['name']); ?>" class="form" required></li>
              <li><label for="tel">tel</label></li>
              <li><input type="tel" name="tel" id="tel" value="<?php print($_SESSION['tel']); ?>" class="form"></li>
              <li><label for="email">email<span class="mandatory">※必須</span></label></li>
              <li><input type="email" name="email" id="email" value="<?php print($_SESSION['email']); ?>" class="form" required></li>
              <li><label for="message">お問い合わせ内容<span class="mandatory">※必須</span></label></li>
              <li><textarea name="message" id="message" cols="50" rows="10"><?php print($_SESSION['message']); ?></textarea></li>
            </ul>
            <input type="submit" name="confirm" value="確認する" class="contact-btn">
          </form>
        </div><!-- end of contact -->
      </div><!-- end of contact-div -->
    <?php elseif ($mode == 'confirm') : ?>
      <!-- 確認画面 -->
      <div class="check-contact-form">
        <h3>お問い合わせ</h3>
        <form action="./contact.php" method="post">
          <ul class="check-contact">
            <li><label for="name">お名前</label></li>
            <li><?php print(htmlspecialchars($_SESSION['name'])); ?></li>
            <li><label for="tel">tel</label></li>
            <li><?php print(htmlspecialchars($_SESSION['tel'])); ?></li>
            <li><label for="email">email</label></li>
            <li><?php print(htmlspecialchars($_SESSION['email'])); ?>
            <li><label for="message">お問い合わせ</label></li>
            <li><?php print(htmlspecialchars($_SESSION['message'])); ?></li>
          </ul>
          <input type="button" onclick="history.back()" value="戻る" class="contact-btn">
          <input type="submit" name="send" value="送信する" class="contact-btn">
        </form>
      </div><!-- end of check-contact-form -->
    <?php else : ?>
      <p class="send-message">送信しました。<br>お問い合わせありがとうございました。</p>
    <?php endif; ?>

    <!-- footer -->

  </div><!-- end of container -->
</body>

</html>