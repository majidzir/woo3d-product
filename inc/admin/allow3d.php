<?php

function allow_3d_model_uploads($mimes)
{
    $mimes['glb'] = 'model/gltf-binary';
    $mimes['gltf'] = 'model/gltf+json';
    $mimes['obj'] = 'model/obj';
    $mimes['stl'] = 'model/stl';
    return $mimes;
}
add_filter('upload_mimes', 'allow_3d_model_uploads');


function allow_unfiltered_uploads_for_admins($caps, $cap) {
    if ($cap === 'unfiltered_upload' && current_user_can('administrator')) {
        $caps = array('unfiltered_upload');
    }
    return $caps;
}
add_filter('map_meta_cap', 'allow_unfiltered_uploads_for_admins', 10, 2);
