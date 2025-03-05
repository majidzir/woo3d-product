<?php


function add_3dmodel_meta_field($form_fields, $post)
{
    $shortcode = get_post_meta($post->ID, '_3d_model_shortcode', true);
    $form_fields['3d_model_shortcode'] = [
        'label' => 'شرت‌کد مدل سه‌بعدی',
        'input' => 'html',
        'html'  => "<input type='text' readonly value='[show_3d_model id=\"{$post->ID}\"]' style='width:100%;' onclick='this.select();'/>"
    ];
    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_3dmodel_meta_field', 10, 2);


function save_3dmodel_shortcode($post_ID)
{
    $file_type = get_post_mime_type($post_ID);
    if (in_array($file_type, ['model/gltf-binary', 'model/gltf+json', 'model/obj', 'model/stl'])) {
        $shortcode = '[show_3d_model id="' . $post_ID . '"]';
        update_post_meta($post_ID, '_3d_model_shortcode', $shortcode);
    }
}
add_action('add_attachment', 'save_3dmodel_shortcode');


function show_3d_model_shortcode($atts)
{
    $atts = shortcode_atts(['id' => ''], $atts);
    $url3d = wp_get_attachment_url($atts['id']);

    if (! $url3d) return "مدل یافت نشد.";

?>
    <div class="shortcode" >
        <?php
        require_once woo3dproduct_inc . '/user/showshortcode.php';
        ?>
    </div>
<?php
}
add_shortcode('show_3d_model', 'show_3d_model_shortcode');
?>