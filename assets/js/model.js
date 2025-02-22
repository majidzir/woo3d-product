jQuery(function ($) {
  $.fn.toggleText = function (t1, t2) {
    return this.text(this.text() === t1 ? t2 : t1);
  };

  $(".btn3d").click(function (e) {
    $("#woo3d-model").toggleClass("hidden");

    $(".show3d").toggleClass("hidden");
    $(".close3d").toggleClass("hidden");

    // $(this).toggleText("نمایش سه بعدی", "بستن سه بعدی");
  });

  $("model-viewer").prependTo(".woocommerce-product-gallery");

  $(".product-btn3d").prependTo(".woocommerce-product-gallery");

  $(".woocommerce-product-gallery").addClass(".important-style-woo3d");

  // $(".woocommerce-product-gallery").each(function () {
  //   this.style.setProperty("position", "relative", "important");
  //   this.style.setProperty("top", "0px", "important");
  //   // this.style.setProperty("right", "0px", "important");
  // });
});



function isTelegramBrowser() {
  return navigator.userAgent.toLowerCase().includes("telegram");
}

function openInDefaultBrowser() {
  const url = window.location.href;
  window.open(url, "_blank");
}

document.addEventListener("DOMContentLoaded", function() {
  const arButton = document.querySelector("model-viewer").shadowRoot.querySelector("button");
  if (arButton) {
      arButton.addEventListener("click", function() {
          if (isTelegramBrowser()) {
              openInDefaultBrowser();
          }
      });
  }
});

// new QRCode(document.getElementById("qr-code"), {
//   text: "https://modelviewer.dev/viewer?src=https://doorkalla.ir/wp-content/uploads/2024/11/shishkebab.glb",
//   width: 300,
//   height: 300
// });
