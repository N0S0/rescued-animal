<?php
require_once('./names.php');
require_once('./DB_recruitment.php');
require_once('./resize.php');

$getPets = getPets();

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
$graduateImg = array_slice($graduateImg, 0, 6);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:767px)">
  <meta name="description" content="<?php print($groupname); ?>のホームページです。
  未来都市を拠点に保健所に収容された犬猫を保護し里親様とのご縁結びをさせていただいております。">

  <!-- OGP -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta property="og:url" content="http://sono-portfolio.work/rescued-animal/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php print($groupname); ?>のトップページ" />
    <meta property="og:description" content="<?php print($groupname); ?>のホームページです。
  未来都市を拠点に保健所に収容された犬猫を保護し里親様とのご縁結びをさせていただいております。" />
    <meta property="og:site_name" content="<?php print($groupname); ?>" />
    <meta property="og:image" content="http://sono-portfolio.work/rescued-animal/img/friends-1149841_1920.jpg" />
    <!-- end of OGP -->

    <!-- css -->
    <link rel="stylesheet" href="modern-css-reset.css">
    <link rel="stylesheet" href="style.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">

    <!-- loading -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.3/themes/orange/pace-theme-loading-bar.min.css" integrity="sha512-QGIcnkvI+fcgzembaMZBAjfymdMRgwGAXowTkMHeKgduaulVyjnqjbbZ3b6WgGWSmWq2fE47QlmH4twDVOhXiw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.3/pace.min.js" integrity="sha512-TJX3dl0dqF2pUpKKtV60kECO4y8blw4ZPIZNEkfUnFepRKfx4nfiI37IqFa1TEsRQJkPGTIK4BBJ2k/lmsK7HA==" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JS -->
    <script src="index.js"></script>
    <title><?php print($groupname); ?>|トップページ</title>
  </head>

<body>
  <div class="container">

    <!-- header -->
    <?php require_once('./header.php'); ?>

    <!-- main -->
    <main>

      <!-- top -->
      <figure class="top-image">
        <img src="./img/friends-1149841_1920.jpg" alt="top-image">
        <figcaption class="top-message fade">
          ぼくたちと<br><span class="family">家族</span>になりませんか？
        </figcaption>
      </figure>

      <p class="sub-message">保護犬猫は飼育放棄、保健所、野良、繁殖場崩壊、多頭飼い崩壊などの
        <br>現場から一時的に保護された犬猫たちです。
        <br>保健所などに保護されている場合は、あくまでも「一時的な保護」であり、
        <br>飼い主が見つからない場合は殺処分される現実があります。
        <br>そんな犬猫たちの新しい家族になりませんか？
      </p>
      <p class="sub-message-res">保護犬猫は飼育放棄、保健所、野良、
        <br>繁殖場崩壊、多頭飼い崩壊などの現場から
        <br>一時的に保護された犬猫たちです。
        <br>保健所などに保護されている場合は、
        <br>あくまでも「一時的な保護」であり、
        <br>飼い主が見つからない場合は
        <br>殺処分される現実があります。
        <br>そんな犬猫たちの新しい家族になりませんか？
      </p>
      <!-- about -->
      <a id="about"></a>
      <figure class="top-image about-image">
        <img src="./img/girl-5623231_1920.jpg" alt="top-image">
        <figcaption class="about fade">
          <h2><?php print($shortname); ?>について</h2>
          <br><?php print($shortname); ?>では、未来都市を拠点に保健所に収容された犬猫を保護し
          <br>里親様とのご縁結びをさせていただいております。
        </figcaption>
        <figcaption class="about-res fade">
          <h2><?php print($shortname); ?>について</h2>
          <br><?php print($shortname); ?>では、未来都市を拠点に<br>保健所に収容された犬猫を保護し
          <br>里親様とのご縁結びをさせていただいております。
        </figcaption>
      </figure>
      <!-- for-foster-homes -->
      <a id="for-have"></a>
      <figure class="top-image for-have-image">
        <img src="./img/paw-548634_1920.jpg" alt="top-image">
        <figcaption class="for-have-message fade">
          <h2>里親をご希望の方へ</h2>
          <div class="for-have">
            <ul class="before-have">
              <h4>ペットを飼う前に</h4>
              <li>家族で話そう</li>
              <li>しっかり説明を受けよう</li>
              <li>飼わないという選択肢もある</li>
            </ul>
            <ul class="after-have">
              <h4>ペットを飼い始めたら</h4>
              <li>最期まで責任を持とう</li>
              <li>連絡先を明示しよう</li>
              <li>逸走防止に努めよう</li>
              <li>むやみに繁殖させない</li>
              <li>猫は室内で飼おう</li>
            </ul>
          </div>
        </figcaption>
      </figure>
      <!-- recruitment -->
      <section class="recruitment-message">
        <h2>家族募集中の子たち</h2>
        <p>画像クリックで拡大表示されます</p>
      </section>

      <?php require_once('./recruitmentView.php') ?>

      <div class="more"><a href="./recruitment.php">more</a></div>

      <!-- adoption-event -->
      <a id="adoption"></a>

      <figure class="top-image adoption-image">
        <img src="./img/pets-3715733_1920.jpg" alt="pets">
        <figcaption>
          <h1 class="next-adoption">次回譲渡会：*月*日！</h1>
        </figcaption>
        <figcaption class="about-adoption fade">
          <h2>譲渡会について</h2>
          <p class="event-p"><?php print($shortname); ?>では毎月第2、4日曜日の10時～13時に<br>譲渡会を実施しております。
            <br>場所：未来都市公園（未来広場あたり）
            <br>フリーマーケットや11時頃からは<br>ワンコイントリマーも実施しております。
          </p>
        </figcaption>
      </figure>

      <div class="adoption">
        <div class="map">
          <h3>会場マップ</h3>

          <p>場所：未来都市公園（未来都市）</p>
          <div class="gmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d414895.21118558047!2d139.4606775547707!3d35.66791911323257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d%3A0xcdd8aef709a2b520!2z5p2x5Lqs6YO95p2x5Lqs!5e0!3m2!1sja!2sjp!4v1612936348847!5m2!1sja!2sjp" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
        <section class="about-covid">
          <h3>新型コロナウイルス対策について</h3>
          <br>
          <p>会場受付にて、以下の点をお願いする予定です。</p>
          <ul>
            <li>マスクの着用</li>
            <li>熱がある場合の入場はお断りいたします</li>
            <li>手洗いと消毒</li>
            <li>連絡先のご記入</li>
          </ul>
          <p>新型コロナウイルス感染防止のため、検温させていただきます</p>
        </section>
      </div>

      <!-- graduate -->
      <section class="graduate-message">
        <h2><?php print($shortname); ?>の卒業生たち</h2>
        <p>画像クリックで拡大表示されます</p>
      </section>
      <?php require_once('./graduateView.php'); ?>
      <div class="more2"><a href="./graduate.php">more</a></div>

      <!-- donate-support -->
      <a id="donate"></a>
      <figure class="top-image donate-image">
        <img src="./img/dog-1912874_1920.jpg" alt="診察される犬" class="donate-image">
        <figcaption class="donate-section fade">
          <h2>ご寄付・ご支援のお願い</h2>
          <p>いただいたご寄付・ご支援はワンちゃんネコちゃんの
            <br>食事や医療費、生活必需品の購入などに利用させていただきます。
            <br><br>
            <h3>皆様のご協力をお待ちしております。<h3>
          </p>
        </figcaption>
      </figure>

    </main>

    <!-- footer -->
    <?php require_once('./footer.php'); ?>

  </div><!-- end of container -->
</body>

</html>