// ローディング後

Pace.on("done", function () {
  let urlHash = location.hash;
  if (urlHash) {
    $("body,html").stop().scrollTop(0);
    setTimeout(function () {
      let target = $(urlHash);
      let position = target.offset().top;
      $("body,html").stop().animate({ scrollTop: position }, 1000);
    }, 1000);
  }

  if ($(window).scrollTop() == 0) {
    setTimeout(function () {
      $(".top-message").addClass("fade-scroll");
    }, 300);
  } else {
    $("top-message").removeClass("fade-scroll");
  }
});

$(function () {
  /*ページ内での移動*/
  $('a[href^="#"]').click(function () {
    let href = $(this).attr("href");
    let target = $(href);
    let position = target.top;
    $("body,html").stop().animate({ scrollTop: position }, 500);
  });

  //スクロールしたらフェードイン
  $(window).scroll(function () {
    $(".fade").each(function () {
      let Pos = $(this).offset().top;
      let scroll = $(window).scrollTop();
      let windowHeight = $(window).height();
      if (scroll > Pos - windowHeight) {
        $(this).addClass("fade-scroll");
      } else {
        $(this).removeClass("fade-scroll");
      }
    });
  });

  //リンク化
  $(".graduate-image, .recruit-image").each(function () {
    let src = $(this).attr("src"); //相対パス
    $(this).wrap($("<a>").prop("href", src));
    // console.log(src);//相対パスが取得
  });

  // ハンバーガーメニュー
  $(".hamburger").click(function () {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(".nav-menu").addClass("active");
      $(".nav-menu").fadeIn(500);
    } else {
      $(".nav-menu").removeClass("active");
      $(".nav-menu").fadeOut(500);
    }
    $(".nav-menu a").click(function () {
      $(".nav-menu").removeClass("active");
      $(".nav-menu").fadeOut(1000);
      $(".hamburger").removeClass("active");
    });
  });
});

//ポップアップ時の余白(左右上下50px)
let w = 100;
let h = 100;

//ポップアップ
$(document).on("click", ".recruitment-image,.gallery-li", function (e) {
  e.preventDefault(); //リンク先に飛ぶのを防ぐ
  let src = $(this).find("img").attr("src");

  //元の画像サイズ
  let thumbnailWidth = $(this).find("img").width();
  let thumbnailHeight = $(this).find("img").height();

  //ウィンドウサイズからサイズを考える
  let width = $(window).width();
  let height = $(window).height();

  //割合計算
  let rate = thumbnailWidth / thumbnailHeight;
  let windowRate = width / height;

  //画像の縦横比率がウィンドウサイズの縦横比率より小さければ高さ基準
  if (rate < windowRate) {
    height -= h;
    width = height * rate;
  } else {
    if (rate < 1) {
      //縦長画像
      if (window.matchMedia("(max-width: 768px)").matches) {
        // スマホの場合
        width -= w;
        height = width / rate;
        // } else {PCの場合
        height -= h;
        width = height * rate;
      }
    } else {
      //横長画像
      width -= w;
      height = width / rate;
    }
  }
  $("body").append(
    `<div class="pop"><img src="${src}" width="${width}" height="${height}" class="pop-image"></div>`
  );
  $(".pop").hide().fadeIn(500);
});

//ポップアップのウィンドウサイズ追従
$(window).resize(function () {
  if ($(".pop").is(":visible")) {
    //ウィンドウサイズからサイズを考える
    let width = $(window).width();
    let height = $(window).height();

    //元の画像サイズ
    let popWidth = $(".pop").children("img").width();
    let popHeight = $(".pop").children("img").height();

    //割合計算
    let rate = popWidth / popHeight;
    let windowRate = width / height;

    //画像の縦横比率がウィンドウサイズの縦横比率より小さければ高さ基準
    if (rate < windowRate) {
      height -= h;
      width = Math.ceil(height * rate);
    } else {
      if (rate < 1) {
        //縦長画像
        height -= h;
        width = Math.ceil(height * rate);
      } else {
        //横長画像
        width -= w;
        height = Math.ceil(width / rate);
      }
    }

    $(".pop").children("img").width(width);
    $(".pop").children("img").height(height);
  }
});

// 消す
$(document).on("click", ".pop", function (e) {
  //動的な追加要素はdocumentで読み込み直す
  $(".pop")
    .fadeOut(500)
    .queue(function () {
      $(this).remove();
    });
});
