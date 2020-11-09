
        <div class="desktop-top-blog-links">
        <ul class="sf-blog-toplinks-ul">
        <li><a href="<?php echo site_url();?>">All</a></li>
        <?php  $taxonomy = 'category';
 
 $term_id = 0;
    if(is_singular('post')){ // post type is optional.
      $terms = wp_get_post_terms( $post->ID, $taxonomy, array("fields" => "ids") );
      if(!empty($terms))
        $term_id = $terms[0]; //we need only one term id
    }

 echo wp_list_categories(
   array(
     'show_count'   => false,
   'pad_counts'   => false,
   'use_desc_for_title' => false,
   'title_li'=>'',
   'hierarchical' =>false,
   'current_category' => $term_id
   )
 );
 ?>
 </ul>
        </div>
