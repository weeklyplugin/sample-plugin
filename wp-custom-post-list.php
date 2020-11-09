<div class="col-md-12 col-lg-8 blog-listing-inner ">
            <div class="row">
            <?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
 <!-- the loop -->
 <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
              <div class="col-md-6">
              <a href="<?php the_permalink();?>">
       

                <?php if (has_post_thumbnail()){
               the_post_thumbnail('full', array('class' => "img-fluid listing-thumbimg")); 
                }
                else{?>
<img src="<?php the_field('fallback_list_thumb','option'); ?>" class="img-fluid listing-thumbimg">
               <?php }           ?>
                
                </a>
                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              </div>
              <?php endwhile; ?>
    <!-- end of the loop -->
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

             
            </div>
          </div>
