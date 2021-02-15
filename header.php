<?php
$url = $_SERVER['REQUEST_URI'];
?>
<header>
  <div class="top">
    <a href="./#">
      <img src="./img/ashiato.png" alt="ashiato" class="ashiato">
      <h1><?php print($groupname); ?></h1>
    </a>
  </div>
  <div class="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="nav-menu">
    <ul>
      <li><a href="./#about"><?php print($shortname); ?>について</a></li>
      <li><a href="./#for-have">里親をご希望の方へ</a></li>
      <li><a href="./recruitment.php">家族募集中の子</a></li>
      <li><a href="./#adoption">譲渡会について</a></li>
      <li><a href="./graduate.php">卒業生たち</a></li>
      <li><a href="./#donate">ご寄付・ご支援のお願い</a></li>
      <li><a href="./contact.php" class="contact-link">お問い合わせ</a></li>
    </ul>
  </nav>
</header>