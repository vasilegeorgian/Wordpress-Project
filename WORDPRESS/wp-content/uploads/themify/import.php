<?php

function themify_do_demo_import() {
$term = array (
  'term_id' => 2,
  'name' => 'Main Navigation',
  'slug' => 'main-navigation',
  'term_group' => 0,
  'taxonomy' => 'nav_menu',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 36,
  'name' => 'About',
  'slug' => 'about',
  'term_group' => 0,
  'taxonomy' => 'nav_menu',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 37,
  'name' => 'Product Categories',
  'slug' => 'product-categories',
  'term_group' => 0,
  'taxonomy' => 'nav_menu',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 38,
  'name' => 'Social',
  'slug' => 'social',
  'term_group' => 0,
  'taxonomy' => 'nav_menu',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 39,
  'name' => 'Support',
  'slug' => 'support',
  'term_group' => 0,
  'taxonomy' => 'nav_menu',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 3,
  'name' => 'simple',
  'slug' => 'simple',
  'term_group' => 0,
  'taxonomy' => 'product_type',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 15,
  'name' => 'rated-5',
  'slug' => 'rated-5',
  'term_group' => 0,
  'taxonomy' => 'product_visibility',
  'description' => '',
  'parent' => 0,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 18,
  'name' => 'Furniture',
  'slug' => 'furniture',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 0,
  'thumbnail' => 'https://themify.me/demo/themes/ultra-craft/files/2021/12/furniture.jpg',
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 19,
  'name' => 'Technology',
  'slug' => 'technology',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 0,
  'thumbnail' => 'https://themify.me/demo/themes/ultra-craft/files/2021/12/drone-1.jpg',
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 20,
  'name' => 'Smart Watch',
  'slug' => 'smart-watch',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 19,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 21,
  'name' => 'Office',
  'slug' => 'office',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 0,
  'thumbnail' => 'https://themify.me/demo/themes/ultra-craft/files/2021/12/office.jpg',
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 23,
  'name' => 'Decor',
  'slug' => 'decor',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 21,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 24,
  'name' => 'Docks &amp; Cases',
  'slug' => 'docks-cases',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 21,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 25,
  'name' => 'Storage',
  'slug' => 'storage',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 18,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 26,
  'name' => 'Lamp',
  'slug' => 'lamp',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 18,
  'thumbnail' => 'https://themify.me/demo/themes/ultra-craft/files/2019/06/lamp-cat.jpg',
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 28,
  'name' => 'Mobile',
  'slug' => 'mobile',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 19,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 29,
  'name' => 'Computer',
  'slug' => 'computer',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 19,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 30,
  'name' => 'Accessories',
  'slug' => 'accessories',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 0,
  'thumbnail' => 'https://themify.me/demo/themes/ultra-craft/files/2021/12/accesories.jpg',
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 32,
  'name' => 'Vase',
  'slug' => 'vase',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 30,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 33,
  'name' => 'Watches',
  'slug' => 'watches',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 30,
);
Themify_Import_Helper::process_import_term( $term );

$term = array (
  'term_id' => 17,
  'name' => 'Chair',
  'slug' => 'chair',
  'term_group' => 0,
  'taxonomy' => 'product_cat',
  'description' => '',
  'parent' => 18,
);
Themify_Import_Helper::process_import_term( $term );

$post = array (
  'ID' => 219,
  'post_date' => '2021-12-23 10:26:34',
  'post_date_gmt' => '2021-12-23 10:26:34',
  'post_content' => '<!-- wp:themify-builder/canvas /--><!--themify_builder_static--><h1>About us</h1>
<h3>Our Mission</h3> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p> <p> </p> <h3>Our vision</h3> <p>Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
<img loading="lazy" src="https://themify.me/demo/themes/ultra-craft/files/2021/12/about-image-450x600.jpg" width="450" height="600" title="about-image" alt="about-image" srcset="https://themify.me/demo/themes/ultra-craft/files/2021/12/about-image-450x600.jpg 450w, https://themify.me/demo/themes/ultra-craft/files/2021/12/about-image.jpg 492w" sizes="(max-width: 450px) 100vw, 450px" />
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eni m ad minim venia.</p>
<h3>Our Story</h3>
<h3>Our team</h3>
<img loading="lazy" src="https://themify.me/demo/themes/ultra-craft/files/2021/12/susie-smith-120x120.jpg" width="120" height="120" title="susie-smith" alt="susie-smith" srcset="https://themify.me/demo/themes/ultra-craft/files/2021/12/susie-smith-120x120.jpg 120w, https://themify.me/demo/themes/ultra-craft/files/2021/12/susie-smith-100x100.jpg 100w, https://themify.me/demo/themes/ultra-craft/files/2021/12/susie-smith.jpg 150w" sizes="(max-width: 120px) 100vw, 120px" />
<h3>Susie Smith</h3>
<a href="https://instagram.com/themify"> <em><svg aria-hidden="true"><use href="#tf-ti-instagram"></use></svg></em> </a> <a href="https://plus.google.com/109280316400365629341"> <em><svg aria-hidden="true"><use href="#tf-ti-google"></use></svg></em> </a> <a href="https://www.linkedin.com/company/themify/"> <em><svg aria-hidden="true"><use href="#tf-ti-linkedin"></use></svg></em> </a>
<p>Duis aute irure dolor in in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur occaecat cupidatat non proident, in culpaqui officia deserunt anim id est laborum.</p>
<img loading="lazy" src="https://themify.me/demo/themes/ultra-craft/files/2021/12/jean-lee-120x120.jpg" width="120" height="120" title="jean-lee" alt="jean-lee" srcset="https://themify.me/demo/themes/ultra-craft/files/2021/12/jean-lee-120x120.jpg 120w, https://themify.me/demo/themes/ultra-craft/files/2021/12/jean-lee-100x100.jpg 100w, https://themify.me/demo/themes/ultra-craft/files/2021/12/jean-lee.jpg 150w" sizes="(max-width: 120px) 100vw, 120px" />
<h3>Jean Lee</h3>
<a href="https://instagram.com/themify"> <em><svg aria-hidden="true"><use href="#tf-ti-instagram"></use></svg></em> </a> <a href="https://plus.google.com/109280316400365629341"> <em><svg aria-hidden="true"><use href="#tf-ti-google"></use></svg></em> </a> <a href="https://www.linkedin.com/company/themify/"> <em><svg aria-hidden="true"><use href="#tf-ti-linkedin"></use></svg></em> </a>
<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur omnis voluptas assumenda.</p>
<img loading="lazy" src="https://themify.me/demo/themes/ultra-craft/files/2021/12/mark-johnson-120x120.jpg" width="120" height="120" title="mark-johnson" alt="mark-johnson" srcset="https://themify.me/demo/themes/ultra-craft/files/2021/12/mark-johnson-120x120.jpg 120w, https://themify.me/demo/themes/ultra-craft/files/2021/12/mark-johnson-100x100.jpg 100w, https://themify.me/demo/themes/ultra-craft/files/2021/12/mark-johnson.jpg 150w" sizes="(max-width: 120px) 100vw, 120px" />
<h3>Mark Johnson</h3>
<a href="https://instagram.com/themify"> <em><svg aria-hidden="true"><use href="#tf-ti-instagram"></use></svg></em> </a> <a href="https://plus.google.com/109280316400365629341"> <em><svg aria-hidden="true"><use href="#tf-ti-google"></use></svg></em> </a> <a href="https://www.linkedin.com/company/themify/"> <em><svg aria-hidden="true"><use href="#tf-ti-linkedin"></use></svg></em> </a>
<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. </p><!--/themify_builder_static-->',
  'post_title' => 'About',
  'post_excerpt' => '',
  'post_name' => 'about',
  'post_modified' => '2021-12-24 07:56:47',
  'post_modified_gmt' => '2021-12-24 07:56:47',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?page_id=219',
  'menu_order' => 0,
  'post_type' => 'page',
  'meta_input' => 
  array (
    'page_layout' => 'sidebar-none',
    'content_width' => 'full_width',
    'hide_page_title' => 'yes',
    'section_scrolling_mobile' => 'on',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"02un864\\",\\"cols\\":[{\\"element_id\\":\\"5qwy866\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"q5wf867\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h1>About us<\\\\/h1>\\"}}]}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"6\\",\\"padding_top_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"lcvj864\\",\\"cols\\":[{\\"element_id\\":\\"htlr869\\",\\"grid_class\\":\\"col4-2\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"i93r869\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Our Mission<\\\\/h3>\\\\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\\\/p>\\\\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.<\\\\/p>\\\\n<p> <\\\\/p>\\\\n<h3>Our vision<\\\\/h3>\\\\n<p>Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.<\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_left\\":\\"4\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f0f0f0\\",\\"border_left_width\\":\\"1\\"}},{\\"element_id\\":\\"9g3h869\\",\\"grid_class\\":\\"col4-2\\",\\"modules\\":[{\\"mod_name\\":\\"image\\",\\"element_id\\":\\"po17870\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\",\\"style_image\\":\\"image-center\\",\\"url_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/ultra-craft\\\\/files\\\\/2021\\\\/12\\\\/about-image.jpg\\",\\"width_image\\":\\"450\\",\\"param_image\\":\\"regular\\",\\"custom_parallax_scroll_speed\\":\\"2\\",\\"custom_parallax_scroll_reverse\\":\\"reverse\\",\\"image_zoom_icon\\":false,\\"auto_fullwidth\\":false,\\"appearance_image\\":false,\\"caption_on_overlay\\":false,\\"title_tag\\":\\"h3\\"}},{\\"element_id\\":\\"ok3r870\\",\\"cols\\":[{\\"element_id\\":\\"6koc871\\",\\"grid_class\\":\\"col4-1\\"},{\\"element_id\\":\\"9h9r871\\",\\"grid_class\\":\\"col4-3\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"munc871\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"font_size\\":\\"15\\",\\"line_height\\":\\"2.3\\",\\"line_height_unit\\":\\"em\\",\\"text_transform\\":\\"uppercase\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eni m ad minim venia.<\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"background_color\\":\\"#fcbb24_0.90\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"8\\",\\"padding_top_unit\\":\\"%\\",\\"padding_right\\":\\"6\\",\\"padding_right_unit\\":\\"%\\",\\"padding_bottom\\":\\"6\\",\\"padding_bottom_unit\\":\\"%\\",\\"padding_left\\":\\"6\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"font_color\\":\\"#000000\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_top\\":\\"-7\\",\\"margin_top_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"font_color\\":\\"#000000\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top_unit\\":\\"%\\",\\"padding_bottom\\":\\"8\\",\\"padding_bottom_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"wt6s864\\",\\"cols\\":[{\\"element_id\\":\\"mu08872\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"dm9s873\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Our Story<\\\\/h3>\\"}}]}]},{\\"element_id\\":\\"cxc1864\\",\\"cols\\":[{\\"element_id\\":\\"bdot873\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"element_id\\":\\"nomc873\\",\\"cols\\":[{\\"element_id\\":\\"t40z874\\",\\"grid_class\\":\\"col4-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"qyc8874\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Our team<\\\\/h3>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"background_color\\":\\"#ffffff\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"3\\",\\"padding_top_unit\\":\\"%\\",\\"padding_left\\":\\"3\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f0f0f0\\",\\"border_left_width\\":\\"1\\"}},{\\"element_id\\":\\"0iqx874\\",\\"grid_class\\":\\"col4-1\\"},{\\"element_id\\":\\"ro76875\\",\\"grid_class\\":\\"col4-1\\"},{\\"element_id\\":\\"udu5875\\",\\"grid_class\\":\\"col4-1\\"}],\\"col_mobile\\":\\"column4-2\\"}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/ultra-craft\\\\/files\\\\/2021\\\\/12\\\\/our-team-bg.jpg\\",\\"background_repeat\\":\\"fullcover\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"50,50\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"360\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"breakpoint_mobile\\":{\\"background_type\\":\\"image\\",\\"background_repeat\\":\\"fullcover\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"200\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"font_color\\":\\"#000000\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"0qea864\\",\\"cols\\":[{\\"element_id\\":\\"c6pn876\\",\\"grid_class\\":\\"col3-1\\",\\"modules\\":[{\\"element_id\\":\\"fh5p876\\",\\"cols\\":[{\\"element_id\\":\\"bkgh876\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"image\\",\\"element_id\\":\\"vywl876\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\",\\"style_image\\":\\"image-top\\",\\"url_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/ultra-craft\\\\/files\\\\/2021\\\\/12\\\\/susie-smith.jpg\\",\\"width_image\\":\\"120\\",\\"param_image\\":\\"regular\\",\\"image_zoom_icon\\":false,\\"auto_fullwidth\\":false,\\"appearance_image\\":false,\\"caption_on_overlay\\":false,\\"title_tag\\":\\"h3\\"}}]},{\\"element_id\\":\\"u7jm876\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"8to8876\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Susie Smith<\\\\/h3>\\"}},{\\"mod_name\\":\\"icon\\",\\"element_id\\":\\"3g1a877\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_icon\\":\\"#b2b2b2\\",\\"font_color_icon_hover\\":\\"#fcc226\\",\\"icon_size\\":\\"small\\",\\"icon_style\\":\\"none\\",\\"icon_position\\":\\"icon_position_left\\",\\"icon_arrangement\\":\\"icon_horizontal\\",\\"content_icon\\":[{\\"icon\\":\\"ti-instagram\\",\\"link\\":\\"https:\\\\/\\\\/instagram.com\\\\/themify\\",\\"link_options\\":\\"regular\\"},{\\"icon\\":\\"ti-google\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/plus.google.com\\\\/109280316400365629341\\",\\"link_options\\":\\"regular\\"},{\\"icon\\":\\"ti-linkedin\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/www.linkedin.com\\\\/company\\\\/themify\\\\/\\",\\"link_options\\":\\"regular\\"}]}}]}],\\"column_alignment\\":\\"col_align_middle\\",\\"col_mobile\\":\\"column4-2\\",\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_bottom\\":\\"30\\",\\"border-type\\":\\"top\\"}},{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"pjbg878\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<p>Duis aute irure dolor in in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur occaecat cupidatat non proident, in culpaqui officia deserunt anim id est laborum.<\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"3\\",\\"padding_top_unit\\":\\"%\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f0f0f0\\",\\"border_left_width\\":\\"1\\",\\"breakpoint_mobile\\":{\\"background_type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"6\\",\\"padding_top_unit\\":\\"%\\",\\"padding_right\\":\\"3\\",\\"padding_right_unit\\":\\"%\\",\\"padding_bottom\\":\\"3\\",\\"padding_bottom_unit\\":\\"%\\",\\"padding_left\\":\\"3\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f0f0f0\\",\\"border_left_width\\":\\"1\\"}}},{\\"element_id\\":\\"6q0q878\\",\\"grid_class\\":\\"col3-1\\",\\"modules\\":[{\\"element_id\\":\\"r323878\\",\\"cols\\":[{\\"element_id\\":\\"bome878\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"image\\",\\"element_id\\":\\"p9i9878\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\",\\"style_image\\":\\"image-top\\",\\"url_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/ultra-craft\\\\/files\\\\/2021\\\\/12\\\\/jean-lee.jpg\\",\\"width_image\\":\\"120\\",\\"param_image\\":\\"regular\\",\\"image_zoom_icon\\":false,\\"auto_fullwidth\\":false,\\"appearance_image\\":false,\\"caption_on_overlay\\":false,\\"title_tag\\":\\"h3\\"}}]},{\\"element_id\\":\\"iwuf879\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"20k9879\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Jean Lee<\\\\/h3>\\"}},{\\"mod_name\\":\\"icon\\",\\"element_id\\":\\"8vea879\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_icon\\":\\"#b2b2b2\\",\\"font_color_icon_hover\\":\\"#fcc226\\",\\"icon_size\\":\\"small\\",\\"icon_style\\":\\"none\\",\\"icon_position\\":\\"icon_position_left\\",\\"icon_arrangement\\":\\"icon_horizontal\\",\\"content_icon\\":[{\\"icon\\":\\"ti-instagram\\",\\"link\\":\\"https:\\\\/\\\\/instagram.com\\\\/themify\\",\\"link_options\\":\\"regular\\"},{\\"icon\\":\\"ti-google\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/plus.google.com\\\\/109280316400365629341\\",\\"link_options\\":\\"regular\\"},{\\"icon\\":\\"ti-linkedin\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/www.linkedin.com\\\\/company\\\\/themify\\\\/\\",\\"link_options\\":\\"regular\\"}]}}]}],\\"column_alignment\\":\\"col_align_middle\\",\\"col_mobile\\":\\"column4-2\\",\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_bottom\\":\\"30\\",\\"border-type\\":\\"top\\"}},{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"c2qx880\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur omnis voluptas assumenda.<\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"3\\",\\"padding_top_unit\\":\\"%\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f0f0f0\\",\\"border_left_width\\":\\"1\\"}},{\\"element_id\\":\\"r1cs881\\",\\"grid_class\\":\\"col3-1\\",\\"modules\\":[{\\"element_id\\":\\"2u8d881\\",\\"cols\\":[{\\"element_id\\":\\"rto3881\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"image\\",\\"element_id\\":\\"thje881\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\",\\"style_image\\":\\"image-top\\",\\"url_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/ultra-craft\\\\/files\\\\/2021\\\\/12\\\\/mark-johnson.jpg\\",\\"width_image\\":\\"120\\",\\"param_image\\":\\"regular\\",\\"image_zoom_icon\\":false,\\"auto_fullwidth\\":false,\\"appearance_image\\":false,\\"caption_on_overlay\\":false,\\"title_tag\\":\\"h3\\"}}]},{\\"element_id\\":\\"t3rn882\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"vh5j882\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Mark Johnson<\\\\/h3>\\"}},{\\"mod_name\\":\\"icon\\",\\"element_id\\":\\"6zis882\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_icon\\":\\"#b2b2b2\\",\\"font_color_icon_hover\\":\\"#fcc226\\",\\"icon_size\\":\\"small\\",\\"icon_style\\":\\"none\\",\\"icon_position\\":\\"icon_position_left\\",\\"icon_arrangement\\":\\"icon_horizontal\\",\\"content_icon\\":[{\\"icon\\":\\"ti-instagram\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/instagram.com\\\\/themify\\",\\"link_options\\":\\"regular\\"},{\\"icon\\":\\"ti-google\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/plus.google.com\\\\/109280316400365629341\\",\\"link_options\\":\\"regular\\"},{\\"icon\\":\\"ti-linkedin\\",\\"icon_color_bg\\":\\"gray\\",\\"link\\":\\"https:\\\\/\\\\/www.linkedin.com\\\\/company\\\\/themify\\\\/\\",\\"link_options\\":\\"regular\\"}]}}]}],\\"column_alignment\\":\\"col_align_middle\\",\\"col_mobile\\":\\"column4-2\\",\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_bottom\\":\\"30\\",\\"border-type\\":\\"top\\"}},{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"809o882\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. <\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"3\\",\\"padding_top_unit\\":\\"%\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f0f0f0\\",\\"border_left_width\\":\\"1\\"}}],\\"gutter\\":\\"gutter-none\\"}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 222,
  'post_date' => '2021-12-23 10:27:32',
  'post_date_gmt' => '2021-12-23 10:27:32',
  'post_content' => '<!-- wp:themify-builder/canvas /--><!--themify_builder_static--><h1>Contact</h1>
<h4>Phone</h4> <p>(111) 123-145-786</p> <h4>Email </h4> <p>craft@email.com</p> <h4>Address</h4> <p>11730 Yonge St, Richmond Hill, Canada</p>
<h3></h3><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=1+Youge+Street%2C+Toronto%2C+ON&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near"></iframe>
<h4>Working Hours</h4> <p>Monday : 09 - 20</p> <p>Tuesday  : 09 - 20</p> <p>Wednesday :  09 - 20</p> <p>Thursday : 09 - 20</p> <p>Friday : 09 - 20</p> <p>Saturday : 09 - 27</p> <p>Sunday  - Closed</p>
<img loading="lazy" src="https://themify.me/demo/themes/ultra-craft/files/2021/12/contact-image-500x609.jpg" width="500" height="609" title="contact-image" alt="contact-image" srcset="https://themify.me/demo/themes/ultra-craft/files/2021/12/contact-image.jpg 500w, https://themify.me/demo/themes/ultra-craft/files/2021/12/contact-image-493x600.jpg 493w" sizes="(max-width: 500px) 100vw, 500px" />
<form action="https://themify.me/demo/themes/ultra-craft/wp-admin/admin-ajax.php" class="builder-contact" id="tb_1qup145-form" method="post" data-post-id="0" data-element-id="1qup145" data-orig-id="" > <label for="tb_1qup145-contact-name">Your Name </label> <input type="text" name="contact-name" placeholder=" " id="tb_1qup145-contact-name" value="" > Your Name <label for="tb_1qup145-contact-email">Your Email </label> <input type="text" name="contact-email" placeholder=" " id="tb_1qup145-contact-email" value="" > Your Email <label for="tb_1qup145-contact-subject">Subject *</label> <input type="text" name="contact-subject" placeholder=" " id="tb_1qup145-contact-subject" value="" required> Subject * <label for="tb_1qup145-contact-message">Message *</label> <textarea name="contact-message" placeholder=" " id="tb_1qup145-contact-message" required></textarea> Message * <button type="submit">Send Message</button> </form><!--/themify_builder_static-->',
  'post_title' => 'Contact',
  'post_excerpt' => '',
  'post_name' => 'contact',
  'post_modified' => '2021-12-24 08:14:57',
  'post_modified_gmt' => '2021-12-24 08:14:57',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?page_id=222',
  'menu_order' => 0,
  'post_type' => 'page',
  'meta_input' => 
  array (
    'page_layout' => 'sidebar-none',
    'content_width' => 'full_width',
    'hide_page_title' => 'yes',
    'section_scrolling_mobile' => 'on',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"v2hs137\\",\\"cols\\":[{\\"element_id\\":\\"au7l139\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"pyu3139\\",\\"mod_settings\\":{\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h1>Contact<\\\\/h1>\\"}}]}],\\"styling\\":{\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"6\\",\\"padding_top_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"655x137\\",\\"cols\\":[{\\"element_id\\":\\"2mgj141\\",\\"grid_class\\":\\"col4-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"lvno142\\",\\"mod_settings\\":{\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_bottom\\":\\"40\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h4>Phone<\\\\/h4>\\\\n<p>(111) 123-145-786<\\\\/p>\\\\n<h4>Email <\\\\/h4>\\\\n<p>craft@email.com<\\\\/p>\\\\n<h4>Address<\\\\/h4>\\\\n<p>11730 Yonge St, Richmond Hill, Canada<\\\\/p>\\"}},{\\"mod_name\\":\\"map\\",\\"element_id\\":\\"y768142\\",\\"mod_settings\\":{\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"map_display_type\\":\\"dynamic\\",\\"address_map\\":\\"1 Youge Street,\\\\nToronto, ON\\",\\"zoom_map\\":\\"15\\",\\"w_map\\":\\"100\\",\\"w_map_unit\\":\\"%\\",\\"w_map_static\\":\\"500\\",\\"h_map\\":\\"200\\",\\"type_map\\":\\"ROADMAP\\",\\"scrollwheel_map\\":\\"disable\\",\\"draggable_map\\":\\"enable\\",\\"draggable_disable_mobile_map\\":\\"yes\\",\\"map_control\\":\\"no\\",\\"map_provider\\":\\"google\\",\\"bing_type_map\\":\\"aerial\\"}}],\\"styling\\":{\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"2\\",\\"padding_top_unit\\":\\"%\\",\\"padding_right\\":\\"2\\",\\"padding_right_unit\\":\\"%\\",\\"padding_left\\":\\"2\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_top_style\\":\\"none\\",\\"border_left_color\\":\\"#f4f4f4\\",\\"border_left_width\\":\\"1\\"}},{\\"element_id\\":\\"dr6h143\\",\\"grid_class\\":\\"col4-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"cwu4143\\",\\"mod_settings\\":{\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h4>Working Hours<\\\\/h4>\\\\n<p>Monday : 09 - 20<\\\\/p>\\\\n<p>Tuesday  : 09 - 20<\\\\/p>\\\\n<p>Wednesday :  09 - 20<\\\\/p>\\\\n<p>Thursday : 09 - 20<\\\\/p>\\\\n<p>Friday : 09 - 20<\\\\/p>\\\\n<p>Saturday : 09 - 27<\\\\/p>\\\\n<p>Sunday  - Closed<\\\\/p>\\"}}],\\"styling\\":{\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"2\\",\\"padding_top_unit\\":\\"%\\",\\"padding_right\\":\\"3\\",\\"padding_right_unit\\":\\"%\\",\\"padding_left\\":\\"2\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"left\\",\\"border_left_color\\":\\"#f4f4f4\\",\\"border_left_width\\":\\"1\\"}},{\\"element_id\\":\\"rjmw144\\",\\"grid_class\\":\\"col4-2\\",\\"modules\\":[{\\"mod_name\\":\\"image\\",\\"element_id\\":\\"0f5d144\\",\\"mod_settings\\":{\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\",\\"style_image\\":\\"image-center\\",\\"url_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/ultra-craft\\\\/files\\\\/2021\\\\/12\\\\/contact-image.jpg\\",\\"width_image\\":\\"500\\",\\"param_image\\":\\"regular\\",\\"custom_parallax_scroll_speed\\":\\"1\\",\\"custom_parallax_scroll_reverse\\":\\"reverse\\",\\"image_zoom_icon\\":false,\\"auto_fullwidth\\":false,\\"appearance_image\\":false,\\"caption_on_overlay\\":false,\\"title_tag\\":\\"h3\\"}}]}],\\"gutter\\":\\"gutter-none\\",\\"styling\\":{\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"0\\",\\"padding_top_unit\\":\\"%\\",\\"padding_bottom\\":\\"8\\",\\"padding_bottom_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"absp137\\",\\"cols\\":[{\\"element_id\\":\\"xiuz145\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"mod_name\\":\\"contact\\",\\"element_id\\":\\"1qup145\\",\\"mod_settings\\":{\\"font_color_type\\":\\"font_color_solid\\",\\"border-type\\":\\"top\\",\\"font_color_labels\\":\\"#000000\\",\\"background_color_inputs\\":\\"#f7f7f7\\",\\"font_color_inputs\\":\\"#000000\\",\\"border_inputs-type\\":\\"all\\",\\"border_inputs_top_style\\":\\"none\\",\\"border_send-type\\":\\"top\\",\\"border_success_message-type\\":\\"top\\",\\"border_error_message-type\\":\\"top\\",\\"layout_contact\\":\\"animated-label\\",\\"gdpr_label\\":\\"I consent to my submitted data being collected and stored\\",\\"field_name_label\\":\\"Your Name\\",\\"field_email_label\\":\\"Your Email\\",\\"field_subject_label\\":\\"Subject\\",\\"field_subject_require\\":\\"yes\\",\\"field_subject_active\\":\\"yes\\",\\"field_message_label\\":\\"Message\\",\\"field_extra\\":\\"{ \\\\\\"fields\\\\\\": [] }\\",\\"field_sendcopy_label\\":\\"Send a copy to myself\\",\\"field_order\\":\\"{}\\",\\"field_send_label\\":\\"Send Message\\",\\"field_send_align\\":\\"right\\",\\"field_email_active\\":\\"yes\\",\\"field_name_active\\":\\"yes\\",\\"field_message_active\\":\\"yes\\",\\"contact_sent_from\\":\\"enable\\",\\"send_to_admins\\":\\"true\\"}}]}],\\"styling\\":{\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"2\\",\\"padding_top_unit\\":\\"%\\",\\"padding_bottom\\":\\"5\\",\\"padding_bottom_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 8,
  'post_date' => '2019-06-20 06:52:44',
  'post_date_gmt' => '2019-06-20 06:52:44',
  'post_content' => '<!-- wp:themify-builder/canvas /--><!--themify_builder_static--><h1>Welcome </h1> <p>Shop over thousands of handcraft products</p>
<ul> <li>
 <a href="https://themify.me/demo/themes/ultra-craft/product-category/technology/"><img src="https://themify.me/demo/themes/ultra-craft/files/woocommerce-placeholder.png" alt="Technology" width="300" height="300" /></a> <a href="https://themify.me/demo/themes/ultra-craft/product-category/technology/"> <h3> Technology </h3> </a> <ul> <li> <a href="https://themify.me/demo/themes/ultra-craft/product-category/technology/smart-watch/"> Smart Watch </a> </li> <li> <a href="https://themify.me/demo/themes/ultra-craft/product-category/technology/mobile/"> Mobile </a> </li> <li> <a href="https://themify.me/demo/themes/ultra-craft/product-category/technology/computer/"> Computer </a> </li> </ul> </li> <li>
 <a href="https://themify.me/demo/themes/ultra-craft/product-category/office/"><img src="https://themify.me/demo/themes/ultra-craft/files/2021/12/office.jpg" alt="Office" width="300" height="300" /></a> <a href="https://themify.me/demo/themes/ultra-craft/product-category/office/"> <h3> Office </h3> </a> <ul> <li> <a href="https://themify.me/demo/themes/ultra-craft/product-category/office/docks-cases/"> Docks &amp; Cases </a> </li> <li> <a href="https://themify.me/demo/themes/ultra-craft/product-category/office/decor/"> Decor </a> </li> </ul> </li> <li>
 <a href="https://themify.me/demo/themes/ultra-craft/product-category/lighting/"><img src="https://themify.me/demo/themes/ultra-craft/files/woocommerce-placeholder.png" alt="Lighting" width="300" height="300" /></a> <a href="https://themify.me/demo/themes/ultra-craft/product-category/lighting/"> <h3> Lighting </h3> </a> </li> <li>
 <a href="https://themify.me/demo/themes/ultra-craft/product-category/jewellery/"><img src="https://themify.me/demo/themes/ultra-craft/files/woocommerce-placeholder.png" alt="Jewellery" width="300" height="300" /></a> <a href="https://themify.me/demo/themes/ultra-craft/product-category/jewellery/"> <h3> Jewellery </h3> </a> </li> </ul>
<h3>Trending</h3>
<ul data-lazy="1"> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/modern-cafe-chair/" title="Modern Cafe Chair"><img loading="lazy" width="600" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2019/06/modern-pub-chair.jpg" title="modern-pub-chair" alt="modern-pub-chair" srcset="https://themify.me/demo/themes/ultra-craft/files/2019/06/modern-pub-chair.jpg 600w, https://themify.me/demo/themes/ultra-craft/files/2019/06/modern-pub-chair-480x600.jpg 480w" sizes="(max-width: 600px) 100vw, 600px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/modern-cafe-chair/" title="Modern Cafe Chair"> Modern Cafe Chair </a> </h3> 
 <bdi>&pound;350.00</bdi> <p><a href="?add-to-cart=26" data-quantity="1" data-product_id="26" data-product_sku="" aria-label="Add &ldquo;Modern Cafe Chair&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/kitchen-hanging-lamp/" title="Kitchen Hanging Lamp"><img loading="lazy" width="600" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2019/06/modern-hanging-lamp.jpg" title="modern-hanging-lamp" alt="modern-hanging-lamp" srcset="https://themify.me/demo/themes/ultra-craft/files/2019/06/modern-hanging-lamp.jpg 600w, https://themify.me/demo/themes/ultra-craft/files/2019/06/modern-hanging-lamp-480x600.jpg 480w" sizes="(max-width: 600px) 100vw, 600px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/kitchen-hanging-lamp/" title="Kitchen Hanging Lamp"> Kitchen Hanging Lamp </a> </h3> 
 <bdi>&pound;30.00</bdi> <p><a href="?add-to-cart=22" data-quantity="1" data-product_id="22" data-product_sku="" aria-label="Add &ldquo;Kitchen Hanging Lamp&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/pandora-2018-woman-necklace/" title="Pandora 2018 Woman Necklace"><img loading="lazy" width="680" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2018/11/woman-necklace.jpg" title="woman-necklace" alt="woman-necklace" srcset="https://themify.me/demo/themes/ultra-craft/files/2018/11/woman-necklace.jpg 680w, https://themify.me/demo/themes/ultra-craft/files/2018/11/woman-necklace-544x600.jpg 544w, https://themify.me/demo/themes/ultra-craft/files/2018/11/woman-necklace-600x662.jpg 600w" sizes="(max-width: 680px) 100vw, 680px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/pandora-2018-woman-necklace/" title="Pandora 2018 Woman Necklace"> Pandora 2018 Woman Necklace </a> </h3> 
 <bdi>&pound;790.00</bdi> <p><a href="?add-to-cart=112" data-quantity="1" data-product_id="112" data-product_sku="" aria-label="Add &ldquo;Pandora 2018 Woman Necklace&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/9/" title="Blue and Green Art Glass Vase"><img loading="lazy" width="680" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2018/11/blue-glass-vase.jpg" title="blue-glass-vase" alt="blue-glass-vase" srcset="https://themify.me/demo/themes/ultra-craft/files/2018/11/blue-glass-vase.jpg 680w, https://themify.me/demo/themes/ultra-craft/files/2018/11/blue-glass-vase-544x600.jpg 544w, https://themify.me/demo/themes/ultra-craft/files/2018/11/blue-glass-vase-600x662.jpg 600w" sizes="(max-width: 680px) 100vw, 680px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/9/" title="Blue and Green Art Glass Vase"> Blue and Green Art Glass Vase </a> </h3> 
 <bdi>&pound;150.00</bdi> <p><a href="?add-to-cart=163" data-quantity="1" data-product_id="163" data-product_sku="" aria-label="Add &ldquo;Blue and Green Art Glass Vase&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/black-vintage-style-lamp/" title="Black Vintage Style Lamp"><img loading="lazy" width="680" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-lamp.jpg" title="vintage-lamp" alt="vintage-lamp" srcset="https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-lamp.jpg 680w, https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-lamp-544x600.jpg 544w, https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-lamp-600x662.jpg 600w" sizes="(max-width: 680px) 100vw, 680px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/black-vintage-style-lamp/" title="Black Vintage Style Lamp"> Black Vintage Style Lamp </a> </h3> 
 <bdi>&pound;125.00</bdi> <p><a href="?add-to-cart=164" data-quantity="1" data-product_id="164" data-product_sku="" aria-label="Add &ldquo;Black Vintage Style Lamp&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/yellow-single-sofa/" title="Yellow Single Sofa"><img loading="lazy" width="680" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-yellow-single-sofa.jpg" title="vintage-yellow-single-sofa" alt="vintage-yellow-single-sofa" srcset="https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-yellow-single-sofa.jpg 680w, https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-yellow-single-sofa-544x600.jpg 544w, https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-yellow-single-sofa-600x662.jpg 600w" sizes="(max-width: 680px) 100vw, 680px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/yellow-single-sofa/" title="Yellow Single Sofa"> Yellow Single Sofa </a> </h3> 
 <bdi>&pound;250.00</bdi> <p><a href="?add-to-cart=165" data-quantity="1" data-product_id="165" data-product_sku="" aria-label="Add &ldquo;Yellow Single Sofa&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/1970-wood-cabinet/" title="1970 Wood Cabinet"><img loading="lazy" width="680" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-cuppboard-cabinet.jpg" title="wood-cuppboard-cabinet" alt="wood-cuppboard-cabinet" srcset="https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-cuppboard-cabinet.jpg 680w, https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-cuppboard-cabinet-544x600.jpg 544w, https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-cuppboard-cabinet-600x662.jpg 600w" sizes="(max-width: 680px) 100vw, 680px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/1970-wood-cabinet/" title="1970 Wood Cabinet"> 1970 Wood Cabinet </a> </h3> 
 <bdi>&pound;375.00</bdi> <p><a href="?add-to-cart=166" data-quantity="1" data-product_id="166" data-product_sku="" aria-label="Add &ldquo;1970 Wood Cabinet&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> <li> <figure> <a href="https://themify.me/demo/themes/ultra-craft/product/handmade-unique-desk-lamp/" title="Handmade Unique Desk Lamp"><img loading="lazy" width="680" height="750" src="https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-craft-lamp.jpg" title="wood-craft-lamp" alt="wood-craft-lamp" srcset="https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-craft-lamp.jpg 680w, https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-craft-lamp-544x600.jpg 544w, https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-craft-lamp-600x662.jpg 600w" sizes="(max-width: 680px) 100vw, 680px" /></a> </figure> <h3> <a href="https://themify.me/demo/themes/ultra-craft/product/handmade-unique-desk-lamp/" title="Handmade Unique Desk Lamp"> Handmade Unique Desk Lamp </a> </h3> 
 <bdi>&pound;125.00</bdi> <p><a href="?add-to-cart=168" data-quantity="1" data-product_id="168" data-product_sku="" aria-label="Add &ldquo;Handmade Unique Desk Lamp&rdquo; to your cart" rel="nofollow">Add to cart</a></p> </li> </ul>
<a href="https://themify.me/demo/themes/shoppe-craft/shop/" > View All Products </a>
<h3>This Month Special</h3> <p>Armchair with removable cover with armrests</p>
<a href="https://themify.me/demo/themes/shoppe-craft/shop" > Buy Now </a>
<img src="https://themify.me/demo/themes/shoppe-craft/files/2018/11/italian-saba-chair-600x489.png" width="600" height="489" title="Handmade Unique Desk Lamp" alt="Handmade Unique Desk Lamp">
<h3>Exclusive <br />Discounts</h3> <p>Subscribe to our Newsletter for exclusive discounts and offers.</p><!--/themify_builder_static-->',
  'post_title' => 'Home',
  'post_excerpt' => '',
  'post_name' => 'home',
  'post_modified' => '2021-12-23 10:39:26',
  'post_modified_gmt' => '2021-12-23 10:39:26',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?page_id=8',
  'menu_order' => 0,
  'post_type' => 'page',
  'meta_input' => 
  array (
    'page_layout' => 'sidebar-none',
    'content_width' => 'full_width',
    'hide_page_title' => 'yes',
    'section_scrolling_mobile' => 'on',
    'mobile_menu_styles' => 'default',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"566n976\\",\\"cols\\":[{\\"element_id\\":\\"qvll977\\",\\"grid_class\\":\\"col4-2\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"ovka977\\",\\"mod_settings\\":{\\"content_text\\":\\"<h1>Welcome <\\\\/h1>\\\\n<p>Shop over thousands of handcraft products<\\\\/p>\\",\\"border_left_width\\":\\"8\\",\\"border_left_color\\":\\"#ffffff\\",\\"border-type\\":\\"left\\",\\"padding_bottom_unit\\":\\"%\\",\\"padding_right_unit\\":\\"%\\",\\"padding_left_unit\\":\\"%\\",\\"padding_top_unit\\":\\"%\\",\\"padding_opp_left\\":\\"1\\",\\"padding_top\\":\\"7\\",\\"background_position\\":\\"50,50\\",\\"background_repeat\\":\\"repeat\\",\\"background_color\\":\\"#fcb724_0.85\\",\\"background_image-type\\":\\"image\\",\\"h1_margin_bottom\\":\\"10\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"padding_left\\":\\"5\\",\\"padding_bottom\\":\\"6\\",\\"padding_right\\":\\"5\\",\\"font_size\\":\\"18\\",\\"font_color_type\\":\\"font_color_solid\\"}}]},{\\"element_id\\":\\"zo9r978\\",\\"grid_class\\":\\"col4-2\\"}],\\"styling\\":{\\"padding_bottom_unit\\":\\"%\\",\\"padding_top_unit\\":\\"%\\",\\"padding_bottom\\":15,\\"padding_opp_top\\":\\"1\\",\\"padding_top\\":15,\\"background_position\\":\\"50,50\\",\\"background_attachment\\":\\"scroll\\",\\"background_repeat\\":\\"fullcover\\",\\"background_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/shoppe-craft\\\\/files\\\\/2018\\\\/11\\\\/slide1-image.jpg\\",\\"background_video_options\\":\\"mute\\",\\"background_slider_speed\\":\\"2000\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_size\\":\\"large\\",\\"background_type\\":\\"image\\",\\"font_color\\":\\"#ffffff\\"}},{\\"element_id\\":\\"r4hi976\\",\\"cols\\":[{\\"element_id\\":\\"27p7978\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"mod_name\\":\\"product-categories\\",\\"element_id\\":\\"0k0e979\\",\\"mod_settings\\":{\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"child_of\\":\\"top-level\\",\\"orderby\\":\\"name\\",\\"order\\":\\"desc\\",\\"hide_empty\\":\\"yes\\",\\"pad_counts\\":\\"no\\",\\"display\\":\\"subcategories\\",\\"latest_products\\":\\"3\\",\\"subcategories_number\\":\\"3\\",\\"cat_desc\\":\\"no\\",\\"number\\":\\"4\\",\\"columns\\":\\"4\\"}}]}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top_unit\\":\\"%\\",\\"padding_bottom_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"g599976\\",\\"cols\\":[{\\"element_id\\":\\"57je979\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"it4t979\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Trending<\\\\/h3>\\"}},{\\"mod_name\\":\\"products\\",\\"element_id\\":\\"rp1h979\\",\\"mod_settings\\":{\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"checkbox_p_p_ctr_apply_all\\":\\"1\\",\\"checkbox_m_p_ctr_apply_all\\":\\"1\\",\\"b_p_ctr-type\\":\\"top\\",\\"checkbox_p_p_ct_apply_all\\":\\"1\\",\\"checkbox_m_p_ct_apply_all\\":\\"1\\",\\"b_p_ct-type\\":\\"top\\",\\"checkbox_p_p_t_apply_all\\":\\"1\\",\\"checkbox_m_p_t_apply_all\\":\\"1\\",\\"b_p_t-type\\":\\"top\\",\\"checkbox_p_p_p_apply_all\\":\\"1\\",\\"checkbox_m_p_p_apply_all\\":\\"1\\",\\"b_p_p-type\\":\\"top\\",\\"checkbox_p_p_b_apply_all\\":\\"1\\",\\"checkbox_m_p_b_apply_all\\":\\"1\\",\\"b_p_b-type\\":\\"top\\",\\"query_products\\":\\"all\\",\\"category_products\\":\\"0|single\\",\\"hide_child_products\\":\\"no\\",\\"hide_free_products\\":\\"no\\",\\"hide_outofstock_products\\":\\"no\\",\\"post_per_page_products\\":\\"8\\",\\"orderby_products\\":\\"date\\",\\"order_products\\":\\"desc\\",\\"template_products\\":\\"list\\",\\"layout_products\\":\\"grid4\\",\\"layout_slider\\":\\"slider-default\\",\\"visible_opt_slider\\":\\"1\\",\\"mob_visible_opt_slider\\":\\"0\\",\\"auto_scroll_opt_slider\\":\\"off\\",\\"scroll_opt_slider\\":\\"1\\",\\"speed_opt_slider\\":\\"normal\\",\\"effect_slider\\":\\"scroll\\",\\"pause_on_hover_slider\\":\\"resume\\",\\"wrap_slider\\":\\"yes\\",\\"show_nav_slider\\":\\"yes\\",\\"show_arrow_slider\\":\\"yes\\",\\"height_slider\\":\\"variable\\",\\"description_products\\":\\"none\\",\\"hide_feat_img_products\\":\\"no\\",\\"unlink_feat_img_products\\":\\"no\\",\\"hide_post_title_products\\":\\"no\\",\\"unlink_post_title_products\\":\\"no\\",\\"hide_price_products\\":\\"no\\",\\"hide_add_to_cart_products\\":\\"no\\",\\"hide_rating_products\\":\\"no\\",\\"hide_sales_badge\\":\\"no\\",\\"hide_page_nav_products\\":\\"yes\\",\\"show_empty_rating\\":false,\\"show_product_tags\\":\\"no\\",\\"show_product_categories\\":\\"no\\",\\"show_arrow_buttons_vertical\\":false,\\"play_pause_control\\":\\"no\\",\\"tag_products\\":\\"0\\",\\"query_type\\":\\"category\\"}},{\\"mod_name\\":\\"buttons\\",\\"element_id\\":\\"989d980\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"text_align\\":\\"center\\",\\"border-type\\":\\"top\\",\\"link_border-type\\":\\"top\\",\\"buttons_size\\":\\"normal\\",\\"buttons_shape\\":\\"squared\\",\\"display\\":\\"buttons-horizontal\\",\\"content_button\\":[{\\"label\\":\\"View All Products\\",\\"link\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/shoppe-craft\\\\/shop\\\\/\\",\\"link_options\\":\\"regular\\",\\"icon_alignment\\":\\"left\\",\\"button_color_bg\\":\\"tb_default_color\\"}]}}]}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"3\\",\\"padding_top_unit\\":\\"%\\",\\"padding_bottom\\":\\"8\\",\\"padding_bottom_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"sxsd976\\",\\"cols\\":[{\\"element_id\\":\\"m8ys980\\",\\"grid_class\\":\\"col-full\\",\\"modules\\":[{\\"element_id\\":\\"4vz0980\\",\\"cols\\":[{\\"element_id\\":\\"jmkm981\\",\\"grid_class\\":\\"col2-1\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"couz981\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>This Month Special<\\\\/h3>\\\\n<p>Armchair with removable cover with armrests<\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"30\\",\\"padding_bottom\\":\\"30\\",\\"padding_left\\":\\"5\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"bp6h981\\",\\"grid_class\\":\\"col2-1\\"}]}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"background_color\\":\\"#f7f7f7\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"breakpoint_mobile\\":{\\"background_type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"text_align\\":\\"center\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin-top\\":\\"30\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"jyt7976\\",\\"cols\\":[{\\"element_id\\":\\"3ob9981\\",\\"grid_class\\":\\"col4-2\\",\\"modules\\":[{\\"mod_name\\":\\"buttons\\",\\"element_id\\":\\"i1ik981\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_top\\":\\"-30\\",\\"margin_left_unit\\":\\"%\\",\\"border-type\\":\\"top\\",\\"checkbox_padding_link_apply_all\\":\\"1\\",\\"checkbox_link_margin_apply_all\\":\\"1\\",\\"link_border-type\\":\\"top\\",\\"breakpoint_mobile\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"text_align\\":\\"center\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_top_unit\\":\\"%\\",\\"margin_left\\":\\"0\\",\\"margin_left_unit\\":\\"%\\",\\"border-type\\":\\"top\\",\\"checkbox_padding_link_apply_all\\":\\"1\\",\\"checkbox_link_margin_apply_all\\":\\"1\\",\\"link_border-type\\":\\"top\\"},\\"buttons_size\\":\\"large\\",\\"buttons_shape\\":\\"squared\\",\\"display\\":\\"buttons-horizontal\\",\\"content_button\\":[{\\"label\\":\\"Buy Now\\",\\"link\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/shoppe-craft\\\\/shop\\",\\"link_options\\":\\"regular\\",\\"icon_alignment\\":\\"left\\",\\"button_color_bg\\":\\"tb_default_color\\"}]}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_left\\":\\"5\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"3r55982\\",\\"grid_class\\":\\"col4-2\\",\\"modules\\":[{\\"mod_name\\":\\"image\\",\\"element_id\\":\\"yfne982\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_top\\":\\"-40\\",\\"margin_top_unit\\":\\"%\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\",\\"breakpoint_mobile\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"margin_top\\":\\"0\\",\\"border-type\\":\\"top\\",\\"checkbox_title_margin_apply_all\\":\\"1\\",\\"checkbox_i_t_p_apply_all\\":\\"1\\",\\"checkbox_i_t_m_apply_all\\":\\"1\\",\\"i_t_b-type\\":\\"top\\",\\"checkbox_c_p_apply_all\\":\\"1\\"},\\"style_image\\":\\"image-top\\",\\"url_image\\":\\"https:\\\\/\\\\/themify.me\\\\/demo\\\\/themes\\\\/shoppe-craft\\\\/files\\\\/2018\\\\/11\\\\/italian-saba-chair-600x489.png\\",\\"width_image\\":\\"600\\",\\"param_image\\":\\"regular\\",\\"image_zoom_icon\\":false,\\"auto_fullwidth\\":false,\\"appearance_image\\":false,\\"caption_on_overlay\\":false}}]}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_bottom\\":\\"7\\",\\"padding_bottom_unit\\":\\"%\\",\\"border-type\\":\\"top\\"}},{\\"element_id\\":\\"dpjl976\\",\\"cols\\":[{\\"element_id\\":\\"rtp7982\\",\\"grid_class\\":\\"col4-3\\",\\"modules\\":[{\\"mod_name\\":\\"text\\",\\"element_id\\":\\"r3ll982\\",\\"mod_settings\\":{\\"background_image-type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_position\\":\\"left-top\\",\\"font_color_type\\":\\"font_color_solid\\",\\"font_color\\":\\"#000000\\",\\"font_gradient_color-gradient\\":\\"0% rgb(0, 0, 0)|100% rgb(255, 255, 255)\\",\\"font_size\\":\\"1.1\\",\\"font_size_unit\\":\\"em\\",\\"checkbox_padding_apply_all\\":\\"1\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"font_color_type_h1\\":\\"font_color_h1_solid\\",\\"font_color_type_h2\\":\\"font_color_h2_solid\\",\\"font_color_type_h3\\":\\"font_color_h3_solid\\",\\"font_size_h3\\":\\"50\\",\\"line_height_h3\\":\\"50\\",\\"font_weight_h3\\":\\"bold\\",\\"font_color_type_h4\\":\\"font_color_h4_solid\\",\\"font_color_type_h5\\":\\"font_color_h5_solid\\",\\"font_color_type_h6\\":\\"font_color_h6_solid\\",\\"checkbox_dropcap_padding_apply_all\\":\\"1\\",\\"checkbox_dropcap_margin_apply_all\\":\\"1\\",\\"dropcap_border-type\\":\\"top\\",\\"content_text\\":\\"<h3>Exclusive <br \\\\/>Discounts<\\\\/h3>\\\\n<p>Subscribe to our Newsletter for exclusive discounts and offers.<\\\\/p>\\"}}],\\"styling\\":{\\"background_type\\":\\"image\\",\\"background_slider_size\\":\\"large\\",\\"background_slider_mode\\":\\"fullcover\\",\\"background_slider_speed\\":\\"2000\\",\\"background_video_options\\":\\"mute\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"background_color\\":\\"#ffc001\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top\\":\\"5\\",\\"padding_top_unit\\":\\"%\\",\\"padding_right\\":\\"210\\",\\"padding_bottom\\":\\"5\\",\\"padding_bottom_unit\\":\\"%\\",\\"padding_left\\":\\"5\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\",\\"breakpoint_mobile\\":{\\"background_type\\":\\"image\\",\\"background_repeat\\":\\"repeat\\",\\"background_attachment\\":\\"scroll\\",\\"background_position\\":\\"center-center\\",\\"cover_color-type\\":\\"color\\",\\"cover_color_hover-type\\":\\"hover_color\\",\\"background_repeat_inner\\":\\"repeat\\",\\"background_attachment_inner\\":\\"scroll\\",\\"background_position_inner\\":\\"center-center\\",\\"checkbox_padding_inner_apply_all\\":\\"1\\",\\"border_inner-type\\":\\"top\\",\\"top-frame_type\\":\\"top-presets\\",\\"bottom-frame_type\\":\\"bottom-presets\\",\\"left-frame_type\\":\\"left-presets\\",\\"right-frame_type\\":\\"right-presets\\",\\"padding_top_unit\\":\\"%\\",\\"padding_right\\":\\"5\\",\\"padding_right_unit\\":\\"%\\",\\"padding_bottom\\":\\"8\\",\\"padding_bottom_unit\\":\\"%\\",\\"padding_left_unit\\":\\"%\\",\\"checkbox_margin_apply_all\\":\\"1\\",\\"border-type\\":\\"top\\"},\\"zi\\":\\"1\\"}},{\\"element_id\\":\\"gjl6982\\",\\"grid_class\\":\\"col4-1\\",\\"modules\\":[{\\"mod_name\\":\\"optin\\",\\"element_id\\":\\"udnm982\\",\\"mod_settings\\":{\\"label_firstname\\":\\"First Name\\",\\"default_fname\\":\\"John\\",\\"label_lastname\\":\\"Last Name\\",\\"default_lname\\":\\"Doe\\",\\"label_submit\\":\\"Subscribe\\",\\"message\\":\\"<p>Success!<\\\\/p>\\",\\"layout\\":\\"tb_optin_horizontal\\",\\"gdpr_label\\":\\"I consent to my submitted data being collected and stored\\",\\"success_action\\":\\"s2\\",\\"lname_hide\\":\\"1\\",\\"fname_hide\\":\\"1\\",\\"provider\\":\\"mailchimp\\",\\"p_sb_opp_left\\":false,\\"p_sb_bottom\\":\\"21\\",\\"p_sb_opp_top\\":\\"1\\",\\"p_sb_top\\":\\"21\\",\\"bg_c_s\\":\\"#000000\\",\\"custom_parallax_scroll_zindex\\":\\"3\\",\\"mailchimp_list\\":\\"297ec65a49\\",\\"b_sh_in_inset\\":false,\\"b_sh_in_color\\":\\"#000000_0.07\\",\\"b_sh_in_blur\\":\\"10\\",\\"b_sh_in_vOffset\\":\\"0\\",\\"b_sh_in_hOffset\\":\\"5\\",\\"bg_c_i\\":\\"#ffffff\\",\\"m_opp_left\\":false,\\"m_opp_top\\":false,\\"p_in_opp_left\\":false,\\"p_in_opp_top\\":\\"1\\",\\"m_left_unit\\":\\"%\\",\\"m_left\\":\\"-30\\",\\"p_in_bottom\\":\\"21\\",\\"p_in_top\\":\\"21\\"}}],\\"styling\\":{\\"padding_right_unit\\":\\"%\\",\\"padding_right\\":0}}],\\"column_alignment\\":\\"col_align_middle\\",\\"gutter\\":\\"gutter-none\\",\\"styling\\":{\\"row_width\\":\\"fullwidth-content\\",\\"padding_right\\":54}}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 112,
  'post_date' => '2018-11-23 11:35:37',
  'post_date_gmt' => '2018-11-23 11:35:37',
  'post_content' => 'Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Pandora 2018 Woman Necklace',
  'post_excerpt' => 'Quidem et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit.',
  'post_name' => 'pandora-2018-woman-necklace',
  'post_modified' => '2021-12-23 09:08:58',
  'post_modified_gmt' => '2021-12-23 09:08:58',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=112',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_regular_price' => '790',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '790',
    '_thumbnail_id' => '175',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/woman-necklace.jpg',
    '_edit_lock' => '1640250413:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"km5m493\\",\\"cols\\":[{\\"element_id\\":\\"t8is494\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/woman-necklace.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 163,
  'post_date' => '2018-11-21 06:47:30',
  'post_date_gmt' => '2018-11-21 06:47:30',
  'post_content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.',
  'post_title' => 'Blue and Green Art Glass Vase',
  'post_excerpt' => 'Nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.',
  'post_name' => '9',
  'post_modified' => '2021-12-23 09:09:17',
  'post_modified_gmt' => '2021-12-23 09:09:17',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=9',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_regular_price' => '150',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '150',
    '_thumbnail_id' => '176',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/blue-glass-vase.jpg',
    '_edit_lock' => '1640250424:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"v7zs371\\",\\"cols\\":[{\\"element_id\\":\\"0hmr373\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories, vase',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/blue-glass-vase.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 164,
  'post_date' => '2018-11-20 07:02:33',
  'post_date_gmt' => '2018-11-20 07:02:33',
  'post_content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Black Vintage Style Lamp',
  'post_excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.',
  'post_name' => 'black-vintage-style-lamp',
  'post_modified' => '2021-12-23 09:10:04',
  'post_modified_gmt' => '2021-12-23 09:10:04',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=26',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '178',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/vintage-lamp.jpg',
    '_regular_price' => '125',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '125',
    '_wp_old_date' => '2018-11-21',
    '_edit_lock' => '1640250478:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"2nkc874\\",\\"cols\\":[{\\"element_id\\":\\"n4mv876\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'lamp, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-lamp.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 165,
  'post_date' => '2018-11-19 07:03:16',
  'post_date_gmt' => '2018-11-19 07:03:16',
  'post_content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.',
  'post_title' => 'Yellow Single Sofa',
  'post_excerpt' => 'Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.',
  'post_name' => 'yellow-single-sofa',
  'post_modified' => '2021-12-23 09:10:45',
  'post_modified_gmt' => '2021-12-23 09:10:45',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=27',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '179',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/vintage-yellow-single-sofa.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '250',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '250',
    '_edit_lock' => '1640250512:171',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"0be0677\\",\\"cols\\":[{\\"element_id\\":\\"atpm679\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'chair, decor, furniture, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-yellow-single-sofa.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 166,
  'post_date' => '2018-11-18 07:04:33',
  'post_date_gmt' => '2018-11-18 07:04:33',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.',
  'post_title' => '1970 Wood Cabinet',
  'post_excerpt' => 'Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.',
  'post_name' => '1970-wood-cabinet',
  'post_modified' => '2021-12-23 09:12:28',
  'post_modified_gmt' => '2021-12-23 09:12:28',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=28',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '180',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/wood-cuppboard-cabinet.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '375',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '375',
    '_edit_lock' => '1640250631:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"6pnb388\\",\\"cols\\":[{\\"element_id\\":\\"ybjq394\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'furniture, storage',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-cuppboard-cabinet.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 168,
  'post_date' => '2018-11-17 07:10:38',
  'post_date_gmt' => '2018-11-17 07:10:38',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.',
  'post_title' => 'Handmade Unique Desk Lamp',
  'post_excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
  'post_name' => 'handmade-unique-desk-lamp',
  'post_modified' => '2021-12-23 09:12:51',
  'post_modified_gmt' => '2021-12-23 09:12:51',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=30',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '181',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/wood-craft-lamp.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '125',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '125',
    '_edit_lock' => '1640250642:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"kus8820\\",\\"cols\\":[{\\"element_id\\":\\"zfeh822\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'furniture, lamp, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-craft-lamp.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 167,
  'post_date' => '2018-11-17 07:07:11',
  'post_date_gmt' => '2018-11-17 07:07:11',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Chicago Wood Single Chair',
  'post_excerpt' => 'Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.',
  'post_name' => 'chicago-wood-single-chair',
  'post_modified' => '2021-12-23 09:14:50',
  'post_modified_gmt' => '2021-12-23 09:14:50',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=29',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '184',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/unique-wood-chair.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '450',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '450',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_edit_lock' => '1640250758:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"tkjo150\\",\\"cols\\":[{\\"element_id\\":\\"4rxy152\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'chair, decor, furniture, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/unique-wood-chair.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 169,
  'post_date' => '2018-11-16 07:12:13',
  'post_date_gmt' => '2018-11-16 07:12:13',
  'post_content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.',
  'post_title' => 'Grey Vintage Sofa',
  'post_excerpt' => 'Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
  'post_name' => 'grey-vintage-sofa',
  'post_modified' => '2021-12-23 09:14:58',
  'post_modified_gmt' => '2021-12-23 09:14:58',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=31',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '185',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/vintage-grey-sofa.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '780',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '780',
    '_edit_lock' => '1640250766:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"ucxo389\\",\\"cols\\":[{\\"element_id\\":\\"m2dy390\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'chair, furniture',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-grey-sofa.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 170,
  'post_date' => '2018-11-15 07:13:33',
  'post_date_gmt' => '2018-11-15 07:13:33',
  'post_content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.',
  'post_title' => 'Mosaic Wood Cupboard',
  'post_excerpt' => 'Nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.',
  'post_name' => 'mosaic-wood-cupboard',
  'post_modified' => '2021-12-23 09:16:41',
  'post_modified_gmt' => '2021-12-23 09:16:41',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=32',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '188',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/vintage-cuppboard-wood-cabinet.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '600',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '600',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_edit_lock' => '1640250931:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"n1ix316\\",\\"cols\\":[{\\"element_id\\":\\"c26i318\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'decor, furniture, office, storage',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/vintage-cuppboard-wood-cabinet.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 172,
  'post_date' => '2018-11-14 07:20:11',
  'post_date_gmt' => '2018-11-14 07:20:11',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.',
  'post_title' => 'Wood Rough Textured Cabinet',
  'post_excerpt' => 'Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.',
  'post_name' => 'wood-rough-textured-cabinet',
  'post_modified' => '2021-12-23 09:17:07',
  'post_modified_gmt' => '2021-12-23 09:17:07',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=34',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '189',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/square-wood-vintage-cabinet.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '780',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '780',
    '_edit_lock' => '1640251076:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"lehj887\\",\\"cols\\":[{\\"element_id\\":\\"uefz889\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'furniture, storage',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/square-wood-vintage-cabinet.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 171,
  'post_date' => '2018-11-14 07:17:31',
  'post_date_gmt' => '2018-11-14 07:17:31',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.',
  'post_title' => 'Modern Wall Shelves',
  'post_excerpt' => 'Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
  'post_name' => 'modern-wall-shelves',
  'post_modified' => '2021-12-23 09:17:37',
  'post_modified_gmt' => '2021-12-23 09:17:37',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=33',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '190',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/unique-wood-wall-rack.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '90',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '90',
    '_edit_lock' => '1640250932:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"1x21376\\",\\"cols\\":[{\\"element_id\\":\\"hwf8378\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories, decor, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/unique-wood-wall-rack.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 173,
  'post_date' => '2018-11-13 07:29:08',
  'post_date_gmt' => '2018-11-13 07:29:08',
  'post_content' => 'Teleniti atque corrupti ero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
  'post_title' => 'Convex Single Desk Lamp',
  'post_excerpt' => 'Yeleniti atque corrupti olores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia.',
  'post_name' => 'convex-single-desk-lamp',
  'post_modified' => '2021-12-23 09:17:51',
  'post_modified_gmt' => '2021-12-23 09:17:51',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=35',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '191',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/simple-retro-lamp.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '125',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '125',
    '_edit_lock' => '1640250939:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"75je178\\",\\"cols\\":[{\\"element_id\\":\\"d18e179\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'furniture, lamp',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/simple-retro-lamp.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 50,
  'post_date' => '2018-11-11 07:30:54',
  'post_date_gmt' => '2018-11-11 07:30:54',
  'post_content' => 'Deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum. Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum.',
  'post_title' => 'Retro and Vintage Single Chair',
  'post_excerpt' => 'Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.',
  'post_name' => 'retro-and-vintage-single-chair',
  'post_modified' => '2021-12-23 09:19:46',
  'post_modified_gmt' => '2021-12-23 09:19:46',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=36',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '194',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/Retro-Chair.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '450',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '450',
    '_edit_lock' => '1640251126:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"z2f9818\\",\\"cols\\":[{\\"element_id\\":\\"ut83819\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'chair, furniture',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/Retro-Chair.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 51,
  'post_date' => '2018-11-10 07:33:11',
  'post_date_gmt' => '2018-11-10 07:33:11',
  'post_content' => 'Voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.',
  'post_title' => 'Vintage Cloth Art Pendant Light',
  'post_excerpt' => 'Numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.',
  'post_name' => 'vintage-cloth-art-pendant-light',
  'post_modified' => '2021-12-23 09:20:12',
  'post_modified_gmt' => '2021-12-23 09:20:12',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=37',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '195',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/black-three-lamp-set.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '375',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '375',
    '_edit_lock' => '1640251271:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"aw56364\\",\\"cols\\":[{\\"element_id\\":\\"7yzx366\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'furniture, lamp, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/black-three-lamp-set.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 121,
  'post_date' => '2018-11-09 11:37:45',
  'post_date_gmt' => '2018-11-09 11:37:45',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.',
  'post_title' => 'Wood Men\'s Watch',
  'post_excerpt' => 'Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
  'post_name' => 'wood-mens-watch',
  'post_modified' => '2021-12-23 09:20:40',
  'post_modified_gmt' => '2021-12-23 09:20:40',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=121',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '196',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/mens-wood-watch.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '500',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '500',
    '_edit_lock' => '1640251271:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"3rty711\\",\\"cols\\":[{\\"element_id\\":\\"8y2j712\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories, watches',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/mens-wood-watch.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 52,
  'post_date' => '2018-11-08 07:35:40',
  'post_date_gmt' => '2018-11-08 07:35:40',
  'post_content' => 'Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Flower Posy Glass Vase',
  'post_excerpt' => 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit.',
  'post_name' => 'flower-posy-glass-vase',
  'post_modified' => '2021-12-23 09:21:03',
  'post_modified_gmt' => '2021-12-23 09:21:03',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=38',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '197',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/art-glass-vase.jpg',
    '_wp_old_date' => '2018-11-21',
    '_regular_price' => '125',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '125',
    '_edit_lock' => '1640251132:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"jwjk296\\",\\"cols\\":[{\\"element_id\\":\\"7ll7297\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories, vase',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/art-glass-vase.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 122,
  'post_date' => '2018-11-06 11:40:12',
  'post_date_gmt' => '2018-11-06 11:40:12',
  'post_content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.',
  'post_title' => 'Artistic Cafe Lamp Pendant',
  'post_excerpt' => 'Nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.',
  'post_name' => 'artistic-cafe-lamp-pendant',
  'post_modified' => '2021-12-23 09:22:58',
  'post_modified_gmt' => '2021-12-23 09:22:58',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=122',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '198',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/wood-lamp.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '250',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '250',
    '_edit_lock' => '1640251306:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"48wg679\\",\\"cols\\":[{\\"element_id\\":\\"isjf681\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'furniture, lamp',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/wood-lamp.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 123,
  'post_date' => '2018-11-05 11:41:20',
  'post_date_gmt' => '2018-11-05 11:41:20',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Ceramics Cone Vase',
  'post_excerpt' => 'Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.',
  'post_name' => 'ceramics-cone-vase',
  'post_modified' => '2021-12-23 09:23:27',
  'post_modified_gmt' => '2021-12-23 09:23:27',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=123',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '199',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/vase-plant.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '125',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '125',
    '_edit_lock' => '1640251451:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"kleg160\\",\\"cols\\":[{\\"element_id\\":\\"avmg162\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories, vase',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/vase-plant.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 124,
  'post_date' => '2018-11-04 11:43:09',
  'post_date_gmt' => '2018-11-04 11:43:09',
  'post_content' => 'Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.',
  'post_title' => '1960s Acrylic Prism Lamp',
  'post_excerpt' => 'Deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum. Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum.',
  'post_name' => '1960s-acrylic-prism-lamp',
  'post_modified' => '2021-12-23 09:23:48',
  'post_modified_gmt' => '2021-12-23 09:23:48',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=124',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '1',
    '_wc_rating_count' => 
    array (
      5 => 1,
    ),
    '_wc_average_rating' => '5.00',
    '_edit_last' => '171',
    '_thumbnail_id' => '200',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/retro-prism-lamp-pendant.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '250',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '250',
    '_edit_lock' => '1640251428:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"96jp678\\",\\"cols\\":[{\\"element_id\\":\\"2f8p681\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_visibility' => 'rated-5',
    'product_cat' => 'furniture, lamp',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/retro-prism-lamp-pendant.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 126,
  'post_date' => '2018-11-03 11:46:14',
  'post_date_gmt' => '2018-11-03 11:46:14',
  'post_content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.',
  'post_title' => 'Swiss Handmade Watch For Men',
  'post_excerpt' => 'Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.',
  'post_name' => 'swiss-handmade-watch-for-men',
  'post_modified' => '2021-12-23 09:24:09',
  'post_modified_gmt' => '2021-12-23 09:24:09',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=126',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '201',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/mens-watch.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '600',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '600',
    '_edit_lock' => '1640251319:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"sgn1571\\",\\"cols\\":[{\\"element_id\\":\\"bmxq578\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories, watches',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/mens-watch.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 125,
  'post_date' => '2018-11-02 11:44:36',
  'post_date_gmt' => '2018-11-02 11:44:36',
  'post_content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.',
  'post_title' => '1960 Medium High Wood Chair',
  'post_excerpt' => 'Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
  'post_name' => '1960-medium-high-wood-chair',
  'post_modified' => '2021-12-23 09:26:13',
  'post_modified_gmt' => '2021-12-23 09:26:13',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=125',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '203',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/retro-wood-chair.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '375',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '375',
    '_edit_lock' => '1640251475:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"w89v146\\",\\"cols\\":[{\\"element_id\\":\\"ojcv148\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'chair, decor, furniture, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/retro-wood-chair.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 127,
  'post_date' => '2018-11-01 11:48:48',
  'post_date_gmt' => '2018-11-01 11:48:48',
  'post_content' => 'Teleniti atque corrupti ero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
  'post_title' => 'Viking Carving Amulet',
  'post_excerpt' => 'Yeleniti atque corrupti olores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia.',
  'post_name' => 'viking-carving-amulet',
  'post_modified' => '2021-12-23 09:26:33',
  'post_modified_gmt' => '2021-12-23 09:26:33',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=127',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '204',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/amulet.jpg',
    '_wp_old_date' => '2018-11-23',
    '_regular_price' => '90',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '90',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_edit_lock' => '1640251620:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"q5hj195\\",\\"cols\\":[{\\"element_id\\":\\"bmf0197\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'accessories',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/11/amulet.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 141,
  'post_date' => '2018-10-24 03:29:17',
  'post_date_gmt' => '2018-10-24 03:29:17',
  'post_content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.',
  'post_title' => 'Zimo Gadget Dock',
  'post_excerpt' => 'Nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.',
  'post_name' => 'zimo-gadget-dock',
  'post_modified' => '2021-12-23 09:26:59',
  'post_modified_gmt' => '2021-12-23 09:26:59',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=141',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_edit_last' => '171',
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_thumbnail_id' => '205',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/iphone-dock.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '115',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '115',
    '_edit_lock' => '1640251640:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"z2ab164\\",\\"cols\\":[{\\"element_id\\":\\"8a9u166\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'docks-cases, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/iphone-dock.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 149,
  'post_date' => '2018-10-23 03:31:47',
  'post_date_gmt' => '2018-10-23 03:31:47',
  'post_content' => 'Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Microsoft Surface Pro',
  'post_excerpt' => 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit.',
  'post_name' => 'microsoft-surface-pro',
  'post_modified' => '2021-12-23 09:27:29',
  'post_modified_gmt' => '2021-12-23 09:27:29',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=149',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '206',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/microsoft.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '1488',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '1488',
    '_edit_lock' => '1640251520:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"cppq127\\",\\"cols\\":[{\\"element_id\\":\\"k3m4129\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'mobile, technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/microsoft.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 150,
  'post_date' => '2018-10-22 03:34:22',
  'post_date_gmt' => '2018-10-22 03:34:22',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Apple iPhone Xs Max 6.5',
  'post_excerpt' => 'Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.',
  'post_name' => 'apple-iphone-xs-max-6-5',
  'post_modified' => '2021-12-23 09:28:33',
  'post_modified_gmt' => '2021-12-23 09:28:33',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=150',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '208',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/iPhone.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '1650',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '1650',
    '_edit_lock' => '1640251583:171',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"mgfb554\\",\\"cols\\":[{\\"element_id\\":\\"92c6555\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'mobile, technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/iPhone.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 151,
  'post_date' => '2018-10-21 03:37:10',
  'post_date_gmt' => '2018-10-21 03:37:10',
  'post_content' => 'Teleniti atque corrupti ero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
  'post_title' => 'iPad Pro Leather Case',
  'post_excerpt' => 'Yeleniti atque corrupti olores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia.',
  'post_name' => 'ipad-pro-leather-case',
  'post_modified' => '2021-12-23 09:29:52',
  'post_modified_gmt' => '2021-12-23 09:29:52',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=151',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '209',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/iPad-pro-case.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '90',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '90',
    '_edit_lock' => '1640251670:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"dg43558\\",\\"cols\\":[{\\"element_id\\":\\"nvn7559\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'docks-cases, office',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/iPad-pro-case.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 156,
  'post_date' => '2018-10-20 11:49:59',
  'post_date_gmt' => '2018-10-20 11:49:59',
  'post_content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.',
  'post_title' => '27-inch iMac Pro',
  'post_excerpt' => 'Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
  'post_name' => '27-inch-imac-pro',
  'post_modified' => '2021-12-23 09:30:50',
  'post_modified_gmt' => '2021-12-23 09:30:50',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=156',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '211',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/iMac.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '2600',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '2600',
    '_edit_lock' => '1640251735:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"qguy71\\",\\"cols\\":[{\\"element_id\\":\\"epp274\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'computer, technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/iMac.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 152,
  'post_date' => '2018-10-20 03:47:35',
  'post_date_gmt' => '2018-10-20 03:47:35',
  'post_content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.',
  'post_title' => 'Proto Smart Watch - Black',
  'post_excerpt' => 'Voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.',
  'post_name' => 'proto-smart-watch-black',
  'post_modified' => '2021-12-23 09:31:15',
  'post_modified_gmt' => '2021-12-23 09:31:15',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=152',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '212',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/smart-watch-black.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '450',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '450',
    '_edit_lock' => '1640251877:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"sve3564\\",\\"cols\\":[{\\"element_id\\":\\"0nzm565\\",\\"grid_class\\":\\"col-full\\"}]}]',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'smart-watch, technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/smart-watch-black.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 159,
  'post_date' => '2018-10-19 13:02:26',
  'post_date_gmt' => '2018-10-19 13:02:26',
  'post_content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'Virtual iPhone Music Dock',
  'post_excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.',
  'post_name' => 'virtual-iphone-music-dock',
  'post_modified' => '2021-12-23 09:34:51',
  'post_modified_gmt' => '2021-12-23 09:34:51',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=159',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '217',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/iPhone-music-dock.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '250',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '250',
    '_edit_lock' => '1640251964:171',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"vfdo20\\",\\"cols\\":[{\\"element_id\\":\\"px2g22\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/iPhone-music-dock.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 155,
  'post_date' => '2018-10-19 11:26:40',
  'post_date_gmt' => '2018-10-19 11:26:40',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.',
  'post_title' => 'Retro Style Smart Watch',
  'post_excerpt' => 'Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.',
  'post_name' => 'retro-style-smart-watch',
  'post_modified' => '2021-12-23 09:32:23',
  'post_modified_gmt' => '2021-12-23 09:32:23',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=155',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '213',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/smart-watch.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '375',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '375',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_edit_lock' => '1640251853:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"yybx675\\",\\"cols\\":[{\\"element_id\\":\\"gfy5676\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'smart-watch, technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/smart-watch.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 153,
  'post_date' => '2018-10-19 03:50:49',
  'post_date_gmt' => '2018-10-19 03:50:49',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.',
  'post_title' => 'iMac Pro  2018',
  'post_excerpt' => 'Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.',
  'post_name' => 'imac-pro-2018',
  'post_modified' => '2021-12-23 09:32:44',
  'post_modified_gmt' => '2021-12-23 09:32:44',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=153',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '214',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/Apple-mac.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '1400',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '1400',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_edit_lock' => '1640251965:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"y6d6957\\",\\"cols\\":[{\\"element_id\\":\\"tu71959\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'computer, technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/Apple-mac.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 162,
  'post_date' => '2018-10-18 13:04:03',
  'post_date_gmt' => '2018-10-18 13:04:03',
  'post_content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.',
  'post_title' => 'Spyder 2.0 Drone',
  'post_excerpt' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
  'post_name' => 'spyder-2-0-drone',
  'post_modified' => '2021-12-23 09:33:14',
  'post_modified_gmt' => '2021-12-23 09:33:14',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/shoppe-craft/?post_type=product&#038;p=162',
  'menu_order' => 0,
  'post_type' => 'product',
  'meta_input' => 
  array (
    '_wc_review_count' => '0',
    '_wc_rating_count' => 
    array (
    ),
    '_wc_average_rating' => '0',
    '_edit_last' => '171',
    '_thumbnail_id' => '215',
    'post_image' => 'https://themify.me/demo/themes/shoppe-craft/files/2018/11/drone.jpg',
    '_wp_old_date' => '2018-11-24',
    '_regular_price' => '600',
    'total_sales' => '0',
    '_tax_status' => 'taxable',
    '_manage_stock' => 'no',
    '_backorders' => 'no',
    '_sold_individually' => 'no',
    '_upsell_ids' => 
    array (
    ),
    '_crosssell_ids' => 
    array (
    ),
    '_default_attributes' => 
    array (
    ),
    '_virtual' => 'no',
    '_downloadable' => 'no',
    '_download_limit' => '-1',
    '_download_expiry' => '-1',
    '_stock_status' => 'instock',
    '_product_version' => '5.8.0',
    '_price' => '600',
    'themify_used_global_styles' => 
    array (
      0 => '',
    ),
    '_edit_lock' => '1640251882:171',
    '_themify_builder_settings_json' => '[{\\"element_id\\":\\"yszd327\\",\\"cols\\":[{\\"element_id\\":\\"o3ln329\\",\\"grid_class\\":\\"col-full\\"}]}]',
  ),
  'tax_input' => 
  array (
    'product_type' => 'simple',
    'product_cat' => 'technology',
  ),
  'thumb' => 'https://themify.me/demo/themes/ultra-craft/files/2018/10/drone.jpg',
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 242,
  'post_date' => '2021-12-24 06:58:11',
  'post_date_gmt' => '2021-12-24 06:58:11',
  'post_content' => '',
  'post_title' => 'Company',
  'post_excerpt' => '',
  'post_name' => 'company',
  'post_modified' => '2021-12-24 06:58:11',
  'post_modified_gmt' => '2021-12-24 06:58:11',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=242',
  'menu_order' => 1,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '242',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'about',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 243,
  'post_date' => '2021-12-24 06:58:11',
  'post_date_gmt' => '2021-12-24 06:58:11',
  'post_content' => '',
  'post_title' => 'Our Story',
  'post_excerpt' => '',
  'post_name' => 'our-story',
  'post_modified' => '2021-12-24 06:58:11',
  'post_modified_gmt' => '2021-12-24 06:58:11',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=243',
  'menu_order' => 2,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '243',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'about',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 244,
  'post_date' => '2021-12-24 06:58:11',
  'post_date_gmt' => '2021-12-24 06:58:11',
  'post_content' => '',
  'post_title' => 'Locations',
  'post_excerpt' => '',
  'post_name' => 'locations',
  'post_modified' => '2021-12-24 06:58:11',
  'post_modified_gmt' => '2021-12-24 06:58:11',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=244',
  'menu_order' => 3,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '244',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'about',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 245,
  'post_date' => '2021-12-24 06:58:11',
  'post_date_gmt' => '2021-12-24 06:58:11',
  'post_content' => '',
  'post_title' => 'Team',
  'post_excerpt' => '',
  'post_name' => 'team',
  'post_modified' => '2021-12-24 06:58:11',
  'post_modified_gmt' => '2021-12-24 06:58:11',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=245',
  'menu_order' => 4,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '245',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'about',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 246,
  'post_date' => '2021-12-24 06:58:11',
  'post_date_gmt' => '2021-12-24 06:58:11',
  'post_content' => '',
  'post_title' => 'Investors',
  'post_excerpt' => '',
  'post_name' => 'investors',
  'post_modified' => '2021-12-24 06:58:11',
  'post_modified_gmt' => '2021-12-24 06:58:11',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=246',
  'menu_order' => 5,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '246',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'about',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 14,
  'post_date' => '2021-12-24 06:56:40',
  'post_date_gmt' => '2019-06-20 15:29:11',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '14',
  'post_modified' => '2021-12-24 06:56:40',
  'post_modified_gmt' => '2021-12-24 06:56:40',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=14',
  'menu_order' => 1,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'post_type',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '8',
    '_menu_item_object' => 'page',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'main-navigation',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 241,
  'post_date' => '2021-12-24 06:56:40',
  'post_date_gmt' => '2021-12-24 06:56:40',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '241',
  'post_modified' => '2021-12-24 06:56:40',
  'post_modified_gmt' => '2021-12-24 06:56:40',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=241',
  'menu_order' => 2,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'post_type',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => 'shop',
    '_menu_item_object' => 'page',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'main-navigation',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 231,
  'post_date' => '2021-12-24 06:56:40',
  'post_date_gmt' => '2021-12-23 11:21:43',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '231',
  'post_modified' => '2021-12-24 06:56:40',
  'post_modified_gmt' => '2021-12-24 06:56:40',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=231',
  'menu_order' => 3,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'post_type',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '219',
    '_menu_item_object' => 'page',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'main-navigation',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 232,
  'post_date' => '2021-12-24 06:56:40',
  'post_date_gmt' => '2021-12-23 11:21:43',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '232',
  'post_modified' => '2021-12-24 06:56:40',
  'post_modified_gmt' => '2021-12-24 06:56:40',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=232',
  'menu_order' => 4,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'post_type',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '222',
    '_menu_item_object' => 'page',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'main-navigation',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 249,
  'post_date' => '2021-12-24 06:59:42',
  'post_date_gmt' => '2021-12-24 06:59:42',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '249',
  'post_modified' => '2021-12-24 06:59:42',
  'post_modified_gmt' => '2021-12-24 06:59:42',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=249',
  'menu_order' => 1,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'taxonomy',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '19',
    '_menu_item_object' => 'product_cat',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'product-categories',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 248,
  'post_date' => '2021-12-24 06:59:42',
  'post_date_gmt' => '2021-12-24 06:59:42',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '248',
  'post_modified' => '2021-12-24 06:59:42',
  'post_modified_gmt' => '2021-12-24 06:59:42',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=248',
  'menu_order' => 2,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'taxonomy',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '21',
    '_menu_item_object' => 'product_cat',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'product-categories',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 247,
  'post_date' => '2021-12-24 06:59:42',
  'post_date_gmt' => '2021-12-24 06:59:42',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '247',
  'post_modified' => '2021-12-24 06:59:42',
  'post_modified_gmt' => '2021-12-24 06:59:42',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=247',
  'menu_order' => 3,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'taxonomy',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '18',
    '_menu_item_object' => 'product_cat',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'product-categories',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 250,
  'post_date' => '2021-12-24 06:59:42',
  'post_date_gmt' => '2021-12-24 06:59:42',
  'post_content' => ' ',
  'post_title' => '',
  'post_excerpt' => '',
  'post_name' => '250',
  'post_modified' => '2021-12-24 06:59:42',
  'post_modified_gmt' => '2021-12-24 06:59:42',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=250',
  'menu_order' => 4,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'taxonomy',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '30',
    '_menu_item_object' => 'product_cat',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'product-categories',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 251,
  'post_date' => '2021-12-24 07:01:09',
  'post_date_gmt' => '2021-12-24 07:01:09',
  'post_content' => '',
  'post_title' => 'Twitter',
  'post_excerpt' => '',
  'post_name' => 'twitter',
  'post_modified' => '2021-12-24 07:01:09',
  'post_modified_gmt' => '2021-12-24 07:01:09',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=251',
  'menu_order' => 1,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '251',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => 'http://twitter.com/themify',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'social',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 252,
  'post_date' => '2021-12-24 07:01:09',
  'post_date_gmt' => '2021-12-24 07:01:09',
  'post_content' => '',
  'post_title' => 'Facebook',
  'post_excerpt' => '',
  'post_name' => 'facebook',
  'post_modified' => '2021-12-24 07:01:09',
  'post_modified_gmt' => '2021-12-24 07:01:09',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=252',
  'menu_order' => 2,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '252',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => 'http://facebook.com/themify',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'social',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 253,
  'post_date' => '2021-12-24 07:01:09',
  'post_date_gmt' => '2021-12-24 07:01:09',
  'post_content' => '',
  'post_title' => 'Youtube',
  'post_excerpt' => '',
  'post_name' => 'youtube',
  'post_modified' => '2021-12-24 07:01:09',
  'post_modified_gmt' => '2021-12-24 07:01:09',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=253',
  'menu_order' => 3,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '253',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => 'https://www.youtube.com/user/themifyme',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'social',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 254,
  'post_date' => '2021-12-24 07:01:09',
  'post_date_gmt' => '2021-12-24 07:01:09',
  'post_content' => '',
  'post_title' => 'Google Plus',
  'post_excerpt' => '',
  'post_name' => 'google-plus',
  'post_modified' => '2021-12-24 07:01:09',
  'post_modified_gmt' => '2021-12-24 07:01:09',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=254',
  'menu_order' => 4,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '254',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => 'https://plus.google.com/109280316400365629341',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'social',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 255,
  'post_date' => '2021-12-24 07:02:32',
  'post_date_gmt' => '2021-12-24 07:02:32',
  'post_content' => '',
  'post_title' => 'Order Status',
  'post_excerpt' => '',
  'post_name' => 'order-status',
  'post_modified' => '2021-12-24 07:02:32',
  'post_modified_gmt' => '2021-12-24 07:02:32',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=255',
  'menu_order' => 1,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '255',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'support',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 256,
  'post_date' => '2021-12-24 07:02:32',
  'post_date_gmt' => '2021-12-24 07:02:32',
  'post_content' => '',
  'post_title' => 'Refund Policies',
  'post_excerpt' => '',
  'post_name' => 'refund-policies',
  'post_modified' => '2021-12-24 07:02:32',
  'post_modified_gmt' => '2021-12-24 07:02:32',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=256',
  'menu_order' => 2,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '256',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'support',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 257,
  'post_date' => '2021-12-24 07:02:32',
  'post_date_gmt' => '2021-12-24 07:02:32',
  'post_content' => '',
  'post_title' => 'Complaints',
  'post_excerpt' => '',
  'post_name' => 'complaints',
  'post_modified' => '2021-12-24 07:02:32',
  'post_modified_gmt' => '2021-12-24 07:02:32',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=257',
  'menu_order' => 3,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '257',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'support',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 258,
  'post_date' => '2021-12-24 07:02:32',
  'post_date_gmt' => '2021-12-24 07:02:32',
  'post_content' => '',
  'post_title' => 'Help',
  'post_excerpt' => '',
  'post_name' => 'help',
  'post_modified' => '2021-12-24 07:02:32',
  'post_modified_gmt' => '2021-12-24 07:02:32',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=258',
  'menu_order' => 4,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '258',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'support',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$post = array (
  'ID' => 259,
  'post_date' => '2021-12-24 07:02:32',
  'post_date_gmt' => '2021-12-24 07:02:32',
  'post_content' => '',
  'post_title' => 'Contact',
  'post_excerpt' => '',
  'post_name' => 'contact',
  'post_modified' => '2021-12-24 07:02:32',
  'post_modified_gmt' => '2021-12-24 07:02:32',
  'post_content_filtered' => '',
  'post_parent' => 0,
  'guid' => 'https://themify.me/demo/themes/ultra-craft/?p=259',
  'menu_order' => 5,
  'post_type' => 'nav_menu_item',
  'xfn' => '',
  'meta_input' => 
  array (
    '_menu_item_type' => 'custom',
    '_menu_item_menu_item_parent' => '0',
    '_menu_item_object_id' => '259',
    '_menu_item_object' => 'custom',
    '_menu_item_classes' => 
    array (
      0 => '',
    ),
    '_menu_item_url' => '#',
  ),
  'tax_input' => 
  array (
    'nav_menu' => 'support',
  ),
);
Themify_Import_Helper::process_post_import( $post );


$widgets = get_option( "widget_nav_menu" );
$widgets[1002] = array (
  'title' => 'Categories',
  'nav_menu' => Themify_Import_Helper::get_term_id_by_slug( "product-categories", "nav_menu" ),
  'tf_search_ajax' => '',
);
update_option( "widget_nav_menu", $widgets );

$widgets = get_option( "widget_nav_menu" );
$widgets[1003] = array (
  'title' => 'About',
  'nav_menu' => Themify_Import_Helper::get_term_id_by_slug( "about", "nav_menu" ),
  'tf_search_ajax' => '',
);
update_option( "widget_nav_menu", $widgets );

$widgets = get_option( "widget_nav_menu" );
$widgets[1004] = array (
  'title' => 'Support',
  'nav_menu' => Themify_Import_Helper::get_term_id_by_slug( "support", "nav_menu" ),
  'tf_search_ajax' => '',
);
update_option( "widget_nav_menu", $widgets );

$widgets = get_option( "widget_nav_menu" );
$widgets[1005] = array (
  'title' => 'Social',
  'nav_menu' => Themify_Import_Helper::get_term_id_by_slug( "social", "nav_menu" ),
  'tf_search_ajax' => '',
);
update_option( "widget_nav_menu", $widgets );

$widgets = get_option( "widget_search" );
$widgets[1006] = array (
  'title' => '',
);
update_option( "widget_search", $widgets );

$widgets = get_option( "widget_recent-posts" );
$widgets[1007] = array (
  'title' => '',
  'number' => 5,
);
update_option( "widget_recent-posts", $widgets );

$widgets = get_option( "widget_recent-comments" );
$widgets[1008] = array (
  'title' => '',
  'number' => 5,
);
update_option( "widget_recent-comments", $widgets );

$widgets = get_option( "widget_archives" );
$widgets[1009] = array (
  'title' => '',
  'count' => 0,
  'dropdown' => 0,
);
update_option( "widget_archives", $widgets );

$widgets = get_option( "widget_categories" );
$widgets[1010] = array (
  'title' => '',
  'count' => 0,
  'hierarchical' => 0,
  'dropdown' => 0,
);
update_option( "widget_categories", $widgets );

$widgets = get_option( "widget_meta" );
$widgets[1011] = array (
  'title' => '',
);
update_option( "widget_meta", $widgets );

$widgets = get_option( "widget_text" );
$widgets[1012] = array (
  'title' => '',
  'text' => 'Ultra Craft is a powerful shop theme created by Themify. It’s powered by WooCommerce and is highly customizable.',
  'filter' => true,
  'visual' => true,
  'tf_search_ajax' => '',
);
update_option( "widget_text", $widgets );



$sidebars_widgets = array (
  'footer-widget-1' => 
  array (
    0 => 'nav_menu-1002',
  ),
  'footer-widget-2' => 
  array (
    0 => 'nav_menu-1003',
  ),
  'footer-widget-3' => 
  array (
    0 => 'nav_menu-1004',
  ),
  'footer-widget-4' => 
  array (
    0 => 'nav_menu-1005',
  ),
  'sidebar-main' => 
  array (
    0 => 'search-1006',
    1 => 'recent-posts-1007',
    2 => 'recent-comments-1008',
    3 => 'archives-1009',
    4 => 'categories-1010',
    5 => 'meta-1011',
  ),
  'footer-social-widget' => 
  array (
    0 => 'text-1012',
  ),
); 
update_option( "sidebars_widgets", $sidebars_widgets );

$homepage = get_posts( array( 'name' => 'home', 'post_type' => 'page' ) );
			if( is_array( $homepage ) && ! empty( $homepage ) ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $homepage[0]->ID );
			}
			$themify_data = array (
  'setting-search_post_type' => 'all',
  'setting-webfonts_list' => 'recommended',
  'setting-customizer_responsive_design_tablet_landscape' => '1280',
  'setting-customizer_responsive_design_tablet' => '768',
  'setting-customizer_responsive_design_mobile' => '680',
  'setting-mobile_menu_trigger_point' => '900',
  'setting-header_design' => 'header-horizontal',
  'setting-exclude_site_tagline' => 'on',
  'setting-exclude_search_form' => 'on',
  'setting_search_form' => 'live_search',
  'setting-header_widgets' => 'headerwidget-4col',
  'setting-footer_design' => 'footer-left-col',
  'setting-use_float_back' => 'on',
  'setting-footer_widgets' => 'footerwidget-4col',
  'setting-footer_widget_position' => 'top',
  'setting-rounded_corners_images' => 'on',
  'setting-rounded_corners_inputs' => 'on',
  'setting-mega_menu_posts' => '5',
  'setting-mega_menu_image_width' => '180',
  'setting-mega_menu_image_height' => '120',
  'setting-mega_menu_post_count' => 'off',
  'setting-color_animation_speed' => '5',
  'setting-relationship_taxonomy' => 'category',
  'setting-relationship_taxonomy_entries' => '3',
  'setting-relationship_taxonomy_display_content' => 'none',
  'setting-single_slider_autoplay' => 'off',
  'setting-single_slider_speed' => 'normal',
  'setting-single_slider_effect' => 'slide',
  'setting-single_slider_height' => 'auto',
  'setting-more_posts' => 'infinite',
  'setting-entries_nav' => 'numbered',
  'setting-gallery_lightbox' => 'lightbox',
  'setting-lazy-blur' => '25',
  'setting-cache-live' => '10080',
  'setting-webp-quality' => '5',
  'setting-default_layout' => 'sidebar1',
  'setting-default_post_layout' => 'list-post',
  'setting-post_filter' => 'no',
  'setting-disable_masonry' => 'yes',
  'setting-post_gutter' => 'gutter',
  'setting-default_layout_display' => 'content',
  'setting-default_more_text' => 'More',
  'setting-index_orderby' => 'date',
  'setting-index_order' => 'DESC',
  'setting-default_media_position' => 'above',
  'setting-image_post_feature_size' => 'blank',
  'setting-default_page_post_layout' => 'sidebar1',
  'setting-default_page_post_layout_type' => 'classic',
  'setting-default_page_single_media_position' => 'above',
  'setting-image_post_single_feature_size' => 'blank',
  'setting-search-result_layout_display' => 'content',
  'setting-search-result_media_position' => 'above',
  'setting-default_page_layout' => 'sidebar1',
  'setting-default_portfolio_index_layout' => 'sidebar-none',
  'setting-default_portfolio_index_post_layout' => 'grid3',
  'setting-portfolio_post_filter' => 'yes',
  'setting-portfolio_disable_masonry' => 'yes',
  'setting-portfolio_gutter' => 'gutter',
  'setting-default_portfolio_index_display' => 'none',
  'setting-default_portfolio_index_post_meta_category' => 'yes',
  'setting-default_portfolio_index_unlink_post_image' => 'yes',
  'setting-default_portfolio_single_layout' => 'sidebar-none',
  'setting-default_portfolio_single_portfolio_layout_type' => 'fullwidth',
  'setting-default_portfolio_single_unlink_post_image' => 'yes',
  'themify_portfolio_slug' => 'project',
  'themify_portfolio_category_slug' => 'portfolio-category',
  'setting-shop_layout' => 'sidebar-none',
  'setting-shop_archive_layout' => 'sidebar-none',
  'setting-products_layout' => 'grid4',
  'setting-product_disable_masonry' => 'yes',
  'setting-product_hover_image' => 'on',
  'setting-product_shop_image_size' => 'custom',
  'setting-default_product_index_image_post_width' => '300',
  'setting-default_product_index_image_post_height' => '331',
  'setting-single_product_layout' => 'sidebar-none',
  'setting-product_single_image_size' => 'woocommerce',
  'setting-related_products_limit' => '3',
  'setting-product_description_type' => 'long',
  'setting-product_tabs_layout' => 'tab',
  'setting-cart_show_seconds' => 'off',
  'setting-img_php_base_size' => 'large',
  'setting-global_feature_size' => 'blank',
  'setting-link_icon_type' => 'font-icon',
  'setting-link_type_themify-link-0' => 'image-icon',
  'setting-link_title_themify-link-0' => 'Twitter',
  'setting-link_img_themify-link-0' => 'https://themify.me/demo/themes/ultra-craft/wp-content/themes/themify-ultra/themify/img/social/twitter.png',
  'setting-link_type_themify-link-1' => 'image-icon',
  'setting-link_title_themify-link-1' => 'Facebook',
  'setting-link_img_themify-link-1' => 'https://themify.me/demo/themes/ultra-craft/wp-content/themes/themify-ultra/themify/img/social/facebook.png',
  'setting-link_type_themify-link-2' => 'image-icon',
  'setting-link_title_themify-link-2' => 'YouTube',
  'setting-link_img_themify-link-2' => 'https://themify.me/demo/themes/ultra-craft/wp-content/themes/themify-ultra/themify/img/social/youtube.png',
  'setting-link_type_themify-link-3' => 'image-icon',
  'setting-link_title_themify-link-3' => 'Pinterest',
  'setting-link_img_themify-link-3' => 'https://themify.me/demo/themes/ultra-craft/wp-content/themes/themify-ultra/themify/img/social/pinterest.png',
  'setting-link_type_themify-link-4' => 'font-icon',
  'setting-link_title_themify-link-4' => 'Twitter',
  'setting-link_ficon_themify-link-4' => 'fa-twitter',
  'setting-link_type_themify-link-5' => 'font-icon',
  'setting-link_title_themify-link-5' => 'Facebook',
  'setting-link_ficon_themify-link-5' => 'fa-facebook',
  'setting-link_type_themify-link-6' => 'font-icon',
  'setting-link_title_themify-link-6' => 'YouTube',
  'setting-link_ficon_themify-link-6' => 'fa-youtube',
  'setting-link_type_themify-link-7' => 'font-icon',
  'setting-link_title_themify-link-7' => 'Pinterest',
  'setting-link_ficon_themify-link-7' => 'fa-pinterest',
  'setting-link_field_ids' => '{"themify-link-0":"themify-link-0","themify-link-1":"themify-link-1","themify-link-2":"themify-link-2","themify-link-3":"themify-link-3","themify-link-4":"themify-link-4","themify-link-5":"themify-link-5","themify-link-6":"themify-link-6","themify-link-7":"themify-link-7"}',
  'setting-link_field_hash' => '8',
  'setting-twitter_settings_cache' => '10',
  'setting-recaptcha_version' => 'v2',
  'setting-page_builder_is_active' => 'enable',
  'setting-page_builder_gallery_lightbox' => 'enable',
  'setting-page_builder_animation_appearance' => 'none',
  'setting-page_builder_animation_parallax_bg' => 'none',
  'setting-page_builder_animation_scroll_effect' => 'none',
  'setting-page_builder_animation_sticky_scroll' => 'none',
  'skin' => 'craft',
);
themify_set_data( $themify_data );
$theme = get_option( 'stylesheet' );
$theme_mods = array (
  0 => false,
  'custom_css_post_id' => -1,
);
update_option( "theme_mods_{$theme}", $theme_mods );
$menu_locations = array();
$menu = get_terms( "nav_menu", array( "slug" => "main-navigation" ) );
if( is_array( $menu ) && ! empty( $menu ) ) $menu_locations["main-nav"] = $menu[0]->term_id;
set_theme_mod( "nav_menu_locations", $menu_locations );



}
