<script type="module" src="<?php echo woo3dproduct_url . '/assets/js/model-viewer.js?ver=13.11' ?>"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script> -->


<div class="product-btn3d">


  <button class="btn3d">نمایش سه بعدی</button>



</div>

<?php $url3d = get_post_meta(get_the_ID(), '_image3d_product_image', true) ?>


<model-viewer id="woo3d-model"  class="hidden" alt="مدل سه بعدی" ar  ar-modes="scene-viewer webxr quick-look" ar-scale="fixed"  interaction-prompt="auto" camera-controls touch-action="pan-y" auto-rotate src="<?php echo $url3d;?>"  shadow-intensity="2" skybox-height="2m">
  <button slot="ar-button" style="background-color: black; border-radius: 0.5rem; position: absolute; bottom: 5px; left: 5px; padding: 0.5rem; color: white; z-index: 1002;">
    <span>فعال کردن AR</span>
  </button>

  <div id="error" class="hide">این دستگاه از AR پشتیبانی نمی کند</div>
</model-viewer>

<script>
  document.querySelector("#woo3d-model").addEventListener('ar-status', (event) => {
    if(event.detail.status === 'failed'){
      const error = document.querySelector("#error");
      error.classList.remove('hide');
      error.addEventListener('transitionend',(event) => {
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