<?php

require_once woo3dproduct_inc . 'admin/allow3d.php';

function image3d_woocommerce_product_metabox()
{
    add_meta_box(
        'woo3d_product_image_box',
        'تصویر سه بعدی محصول',
        'woo3d_product_image_metabox_callback',
        'product',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'image3d_woocommerce_product_metabox');

function woo3d_product_image_metabox_callback($post)
{



    $image3d = get_post_meta($post->ID, '_image3d_product_image', true);
?>
    <p>
        <label for="image3d_product_image">گزینش نگاره محصول:</label>
    <p>
        <input  type="text" id="image3d_product_image" name="image3d_product_image" value="<?php echo esc_attr($image3d); ?>" style="width: 100%;" />

    </p>

    <button type="button" class="button image3d_upload_image_button">انتخاب تصویر</button>
    </p>
    <script>
        jQuery(document).ready(function($) {
            $('.image3d_upload_image_button').click(function(e) {
                e.preventDefault();

                var image = wp.media({
                        title: 'انتخاب تصویر',
                        library: {
                            type: ['model/gltf-binary', 'model/gltf+json', 'application/octet-stream']
                        }, // GLB, GLTF, STL
                        multiple: false
                    }).open()
                    .on('select', function() {
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        var image_type = uploaded_image.toJSON().mime;


                        var allowedTypes = ['model/gltf-binary', 'model/gltf+json', 'application/octet-stream'];

                        if (!allowedTypes.includes(image_type)) {
                            alert('فقط فایل‌های GLB, GLTF, OBJ یا STL مجاز هستند.');
                            return;
                        }

                        $('#image3d_product_image').val(image_url);
                    });
            });
        });
    </script>
<?php
}

function save_image3d_product_metabox($post_id)
{
    if (isset($_POST['image3d_product_image'])) {
        update_post_meta($post_id, '_image3d_product_image', sanitize_text_field($_POST['image3d_product_image']));
    }
}
add_action('save_post', 'save_image3d_product_metabox');