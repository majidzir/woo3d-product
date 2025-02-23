<script type="module" src="<?php echo woo3dproduct_url . '/assets/js/model-viewer.js?ver=13.11' ?>"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script> -->


<div class="product-btn3d">


  <button class="btn3d">

    <img class="show3d " src="<?php echo esc_sql(woo3dproduct_url . '/assets/img/3D-rotation-02.svg') ?>" alt="">


    <svg class="close3d hidden" xmlns="http://www.w3.org/2000/svg" fill="none" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
    </svg>





  </button>






</div>

<?php $url3d = get_post_meta(get_the_ID(), '_image3d_product_image', true) ?>


<model-viewer id="woo3d-model" class="hidden" alt="مدل سه بعدی" ar ar-modes="scene-viewer webxr quick-look" ar-scale="fixed" interaction-prompt="auto" camera-controls touch-action="pan-y" auto-rotate src="<?php echo $url3d; ?>" shadow-intensity="2" skybox-height="2m">
  <button class="btnar btn3d" slot="ar-button">
    <svg fill="#000000" width="40" height="40" viewBox="0 -0.08 20 20" data-name="Capa 1" id="Capa_1" xmlns="http://www.w3.org/2000/svg">
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
      <g id="SVGRepo_iconCarrier">
        <path d="M13.26,1.92H6.74a1.9,1.9,0,0,0-1.9,1.89V16a1.9,1.9,0,0,0,1.9,1.89h6.52A1.9,1.9,0,0,0,15.16,16V3.81A1.9,1.9,0,0,0,13.26,1.92ZM14.41,16a1.15,1.15,0,0,1-1.15,1.14H6.74A1.15,1.15,0,0,1,5.59,16V3.81A1.15,1.15,0,0,1,6.74,2.67h.75a.61.61,0,0,0,.61.62h3.8a.61.61,0,0,0,.61-.62h.75a1.15,1.15,0,0,1,1.15,1.14Z"></path>
        <path d="M11.12,15.74H8.88a.38.38,0,0,0,0,.75h2.24a.38.38,0,1,0,0-.75Z"></path>
        <path d="M9.05,10.9l.41.9A.38.38,0,0,0,10,12a.37.37,0,0,0,.18-.5L8.66,8.23A.39.39,0,0,0,8.31,8h0A.37.37,0,0,0,8,8.24L6.5,11.51a.39.39,0,0,0,.19.5l.15,0a.38.38,0,0,0,.35-.22l.41-.92ZM8.32,9.3l.38.85H7.94Z"></path>
        <path d="M13.65,9.36a1.48,1.48,0,0,0-1.48-1.48H10.8a.37.37,0,0,0-.37.38s0,.05,0,.08v3.3a.37.37,0,0,0,.37.37.38.38,0,0,0,.38-.37v-.8h1.08l.7,1a.4.4,0,0,0,.31.16.36.36,0,0,0,.22-.07.37.37,0,0,0,.09-.52L13,10.58A1.46,1.46,0,0,0,13.65,9.36Zm-2.46-.73h1a.73.73,0,0,1,0,1.46h-1Z"></path>
      </g>
    </svg>
  </button>

  <div id="error" class="hide">این دستگاه از AR پشتیبانی نمی کند</div>
</model-viewer>

<script>
  document.querySelector("#woo3d-model").addEventListener('ar-status', (event) => {
    if (event.detail.status === 'failed') {
      const error = document.querySelector("#error");
      error.classList.remove('hide');
      error.addEventListener('transitionend', (event) => {
        error.classList.add('hide');
      });
    }
  });
</script>
<style>
  #error {
    background-color: #ffffffdd;
    border-radius: 16px;
    padding: 16px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate3d(-50%, -50%, 0);
    transition: opacity 0.3s;
  }

  #error.hide {
    opacity: 0;
    visibility: hidden;
    transition: visibility 2s, opacity 1s 1s;
  }
</style>






<button id="open-in-browser" style="display: none; padding: 10px 15px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
</button>

<script>
    function isInAppBrowser() {
        const ua = navigator.userAgent || navigator.vendor || window.opera;
        return (/FBAN|FBAV|Instagram|Line|KAKAOTALK|Snapchat|WhatsApp|Telegram/i.test(ua));
    }

    function openInBrowser() {
        const url = window.location.href;
        
        window.open(url, "_blank");

        setTimeout(() => {
            alert("اگر صفحه در مرورگر باز نشد، لطفاً گزینه 'Open in Browser' را از منوی مرورگر داخلی انتخاب کنید.");
        }, 1000);
    }

    if (isInAppBrowser()) {
        document.getElementById("open-in-browser").style.display = "block";
        document.getElementById("open-in-browser").addEventListener("click", openInBrowser);
    }
</script>
