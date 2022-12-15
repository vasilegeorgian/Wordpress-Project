<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
/**
 * Template Archive Posts
 *
 * Access original fields: $args['mod_settings']
 * @author Themify
 */
$fields_default = array(
    'layout_post' => 'grid3',
    'masonry' => 'off',
    'no_found'=>'',
    'per_page' => get_option( 'posts_per_page' ),
    'pagination' => 'yes',
    'pagination_option' => 'numbers',
    'next_link' => '',
    'prev_link' => '',
    'tab_content_archive_posts' => array(),
    'css' => '',
    'animation_effect' => '',
    'offset'=>'',
    'order' => 'DESC',
    'orderby' => 'ID',
    // static query in APP
    'post_type' => 'post',
    'term_type' => 'category',
    'terms' => '',
    'tax' => '',
    'slug' => '',
);
if (isset($args['mod_settings']['tab_content_archive_posts']['image']['val']['appearance_image'])) {
	$args['mod_settings']['tab_content_archive_posts']['image']['val']['appearance_image'] = self::get_checkbox_data($args['mod_settings']['tab_content_archive_posts']['image']['val']['appearance_image']);
}
$fields_args = wp_parse_args($args['mod_settings'], $fields_default);
unset($args['mod_settings']);
$fields_default=null;
$mod_name=$args['mod_name'];
$element_id =$args['module_ID'];
$builder_id=$args['builder_id'];
$container_class = apply_filters('themify_builder_module_classes', array(
    'module',
    'module-' . $mod_name,
    $element_id,
    $fields_args['css'],
	    isset($fields_args['tab_content_archive_posts']['image']['val']['appearance_image']) ? 'module-image '.$fields_args['tab_content_archive_posts']['image']['val']['appearance_image'] : ''
    ), $mod_name,$element_id, $fields_args );

if(!empty($fields_args['global_styles']) && Themify_Builder::$frontedit_active===false){
    $container_class[] = $fields_args['global_styles'];
}
elseif(Tbp_Public::$isTemplatePage===true || (isset($_POST['pageId']) && Themify_Builder::$frontedit_active===true)){
	Tbp_Utils::get_actual_query();
}
$paged = $fields_args['pagination'] === 'yes' || $fields_args['pagination'] === 'on' ? self::get_paged_query() : 1;

$per_page = (int)$fields_args['per_page'];
$post_type = get_query_var('post_type');
if ( Tbp_Public::$isTemplatePage === true || empty( $post_type ) ) {
	$post_type = 'post';
}

if ( isset( $fields_args['builder_content'] ) && Tbp_Utils::$isLoop === true ) {
	    $fields_args['builder_id'] = $args['builder_id'];
	    unset( $fields_args['tab_content_archive_posts'] );
	    $isAPP = true;
	    if ( is_string( $fields_args['builder_content'] ) ) {
		    $fields_args['builder_content']= json_decode($fields_args['builder_content'],true);
	    }
		$container_class[] = 'themify_builder_content-' . str_replace( 'tb_', '', $module_ID );
} else {
	    $isAPP = null;
}
    if($fields_args['orderby']==='id'){
	$fields_args['orderby']='ID';
    }
    $query_args = array(
	    'post_type' => $post_type,
	    'post_status' => 'publish',
	    'ptb_disable'=>true,
	    'order' => $fields_args['order'],
	    'orderby' => $fields_args['orderby'],
	    'posts_per_page' => $per_page,
	    'paged' => $paged,
	    'offset' => ( ( $paged - 1 ) * $per_page ),
    );
	if ( true === Themify_Builder::$frontedit_active && isset( $_POST['pageId'] ) ) {
		$query_args['post__not_in'] = array( $_POST['pageId'] );
	} else {
		if ( false !== ( $id = get_the_ID() ) && is_single( $id ) ) {
			$query_args['post__not_in'] = array( $id );
		}
	}
    if($fields_args['offset']!==''){
	$query_args['offset']+=(int)$fields_args['offset'];
    }

    if( ! empty( $fields_args['meta_key'] ) && ($query_args['orderby']==='meta_value' || $query_args['orderby']==='meta_value_num')) {
	    $query_args[ 'meta_key' ] = $fields_args['meta_key'];
    }
    if ( $isAPP===true && Tbp_Public::$is_archive===false) {
	    // on non-archive pages, AAP module acts like Post module, displays posts from a custom query
	    $query_args['ignore_sticky_posts'] = true;
	    $query_args['post_type'] = $fields_args['post_type'];
	    if ( $fields_args['term_type'] === 'post_slug' && $fields_args['slug']!=='' ) {
		    $query_args['post__in'] = Themify_Builder_Model::parse_slug_to_ids( $fields_args['slug'], $query_args['post_type'] );
	    } else {
		     Themify_Builder_Model::parseTermsQuery($query_args,$fields_args['terms'],$fields_args['tax'] );
	    }
    } else {
	    if ('related-posts' === $mod_name) {
		    $query_args['tax_query'] = array(
			    array(
				    'taxonomy' => $fields_args['term_type'],
				    'field' => 'id',
				    'terms' => $fields_args['term_id']
			    )
		    );
    }else if ( is_category() || is_tag() || is_tax() ) {
		    $obj = get_queried_object();
		    if ( !empty( $obj ) ) {
			    if(is_category()){
				    $query_args['cat'] = $obj->term_id;
			    }
			    elseif (is_tag() ) {
				    $query_args['tag_id'] = $obj->term_id;
			    }
			    elseif(is_tax()){
				    $tax = get_taxonomy($obj->taxonomy);
				    if(!empty($tax)){
					    $query_args['tax_query']=array(
						    array(
						    'taxonomy' => $obj->taxonomy,
						    'field'    => 'id',
						    'terms'    => $obj->term_id
						    )
					    );
					    $query_args['post_type']=$tax->object_type;
				    }
			    }
		    }
	    }
	    elseif(Tbp_Public::$isTemplatePage===false){
		    global $wp_query;
		    if(is_array($wp_query->query)){
			    $query_args = $query_args+$wp_query->query;
		    }
	    }
	    else{
		$query_args['ignore_sticky_posts']=true;
	    }		

    }
$container_props = apply_filters('themify_builder_module_container_props', array(
    'class' => implode(' ', $container_class),
	), $fields_args, $mod_name,$element_id);	
$the_query = new WP_Query( $query_args );
$query_args=$args=null;
?>
<!-- <?php echo $mod_name?> module -->
<div <?php echo self::get_element_attributes( self::sticky_element_props( $container_props, $fields_args ) ); ?>>
    <?php
    do_action('themify_builder_background_styling',$builder_id,array('styling'=>$fields_args,'mod_name'=>$mod_name),$element_id,'module');
    $container_props=$container_class=null;
    if ( $the_query->have_posts() ) :
	
	$class=array('builder-posts-wrap','loops-wrapper');
	if($post_type !== 'post'){
	    $class[]= join( ' ', (array) $post_type );
	}
	if($fields_args['masonry'] === 'yes' && in_array($fields_args['layout_post'], array('grid2', 'grid3', 'grid4'), true)){
	    $class[]='tbp_masonry';
	    $class[]='masonry';
	}
	$class[]=apply_filters('themify_builder_module_loops_wrapper', $fields_args['layout_post'],$fields_args,$mod_name);//deprecated backward compatibility
	$class=apply_filters( 'themify_loops_wrapper_class', $class,$post_type,$fields_args['layout_post'],'builder',$fields_args,$mod_name);
	
	$class[]='tf_clear';
	$class[]='clearfix';
	$container_props = apply_filters('themify_builder_module_container_props', self::parse_animation_effect($fields_args,array(
	     'class' => implode(' ',$class)
	)), $post_type,$fields_args['layout_post'],$fields_args,$mod_name);
	
	if(Themify_Builder::$frontedit_active===false){
	    $container_props['data-lazy']=1;
	}
	unset($class);
	
	Tbp_Utils::disable_ptb_loop();
	$isLoop = $ThemifyBuilder->in_the_loop === true;
	$ThemifyBuilder->in_the_loop = true;
	?>
	    <?php if ( ! empty( $fields_args['heading'] ) ) : ?>
		    <h2><?php echo $fields_args['heading']; ?></h2>
	<?php endif; ?>
	<div <?php echo self::get_element_attributes($container_props); ?>>
	    <?php
	    unset($container_props);
	    while ($the_query->have_posts()) :
		$the_query->the_post();
		themify_post_before(); // hook
		?>
		    <article itemscope itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
			    <?php
			    themify_post_start(); // hook
			    if($isAPP===true){
				self::retrieve_template('partials/advanched-archive.php', $fields_args);
			    }
			    else{
				self::retrieve_template('partials/simple-archive.php', $fields_args);
			    }
			    themify_post_end(); // hook
			    ?>
		    </article>
		<?php
		themify_post_after(); // hook
	    endwhile;
	    wp_reset_postdata();
	    ?>
	</div>
	<?php
	$ThemifyBuilder->in_the_loop = $isLoop;
	if ($fields_args['pagination'] === 'yes') {
	    self::retrieve_template('partials/pagination.php', array(
		'pagination_option' => $fields_args['pagination_option'],
		'next_link' => $fields_args['next_link'],
		'prev_link' => $fields_args['prev_link'],
		'query' => $the_query
	    ));
	}
	?>
    <?php else:?>
	<?php echo $fields_args['no_found'];?>
    <?php endif; ?>
</div>
<!-- /<?php echo $mod_name?> module -->
