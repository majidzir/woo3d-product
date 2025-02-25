document.addEventListener("fullscreenchange", exitFullScreenHandler);
document.addEventListener("webkitfullscreenchange", exitFullScreenHandler);
document.addEventListener("mozfullscreenchange", exitFullScreenHandler);
document.addEventListener("MSFullscreenChange", exitFullScreenHandler);

function exitFullScreenHandler() {
  if (
    !document.fullscreenElement &&
    !document.webkitFullscreenElement &&
    !document.mozFullScreenElement &&
    !document.msFullscreenElement
  ) {
    jQuery(function ($) {
      $("#btn-fullexit").toggleClass("hidden");
      $("#btn-full").toggleClass("hidden");
    });
  } else {
    jQuery(function ($) {
      $("#btn-fullexit").toggleClass("hidden");
      $("#btn-full").toggleClass("hidden");
    });
  }
}

jQuery(function ($) {
  $("#btn3d").click(function (e) {
    $("#woo3d-model").toggleClass("hidden");

    $(".show3d").toggleClass("hidden");
    $(".close3d").toggleClass("hidden");
  });

  $("#btn-full").click(function (e) {
    const modelViewer = document.getElementById("woo3d-model");

    if (modelViewer.requestFullscreen) {
      modelViewer.requestFullscreen();
    } else if (modelViewer.webkitRequestFullscreen) {
      modelViewer.webkitRequestFullscreen();
    } else if (modelViewer.msRequestFullscreen) {
      modelViewer.msRequestFullscreen();
    }
  });

  $("#btn-fullexit").click(function (e) {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  });

  $("#btnar").click(function (e) {
    function isInAppBrowser() {
      let userAgent = navigator.userAgent || navigator.vendor;
      return (
        userAgent.includes("FBAN") || // Facebook
        userAgent.includes("FBAV") || // Facebook
        userAgent.includes("Instagram") || // Instagram
        userAgent.includes("Twitter") || // Twitter
        userAgent.includes("Snapchat") || // Snapchat
        userAgent.includes("WhatsApp") || // WhatsApp
        userAgent.includes("Telegram") // Telegram
      );
    }

    if (isInAppBrowser()) {
      alert(
        "برای تجربه AR بهتر، لطفاً این صفحه را در مرورگر Safari یا Chrome باز کنید."
      );
    }
  });

  $("model-viewer").prependTo(".woocommerce-product-gallery");

  $(".product-btn3d").prependTo(".woocommerce-product-gallery");

  $(".woocommerce-product-gallery").addClass(".important-style-woo3d");

  $(".woocommerce-product-gallery").each(function () {
    this.style.setProperty("position", "relative", "important");
    this.style.setProperty("top", "0px", "important");
    this.style.setProperty("right", "0px", "important");
  });
});

// function isInAppBrowser() {
//   const ua = navigator.userAgent || navigator.vendor || window.opera;
//   return (/FBAN|FBAV|Instagram|Line|KAKAOTALK|Snapchat|WhatsApp|Telegram/i.test(ua));
// }

// function openInBrowser() {
//   const url = window.location.href;

//   window.open(url, "_blank");

//   setTimeout(() => {
//       alert("اگر صفحه در مرورگر باز نشد، لطفاً گزینه 'Open in Browser' را از منوی مرورگر داخلی انتخاب کنید.");
//   }, 1000);
// }

// if (isInAppBrowser()) {
//    jQuery(function($){
//     $('.brow').removeClass('hidden');
//    });
//   document.getElementById("open-in-browser").addEventListener("click", openInBrowser);
// }

// new QRCode(document.getElementById("qr-code"), {
//   text: "https://modelviewer.dev/viewer?src=https://doorkalla.ir/wp-content/uploads/2024/11/shishkebab.glb",
//   width: 300,
//   height: 300
// });
