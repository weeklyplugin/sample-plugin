 <div class="recent-post-main">
                    <h2>Recent Posts</h2>
                    <ul class="recentpost-list">
                    <?php 
// the query
$recent_posts = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>4)); ?>
 
<?php if ( $recent_posts->have_posts() ) : ?>
 <!-- the loop -->
 <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
         
              <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
              <?php endwhile; ?>
    <!-- end of the loop -->
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'No recent post avaiable.' ); ?></p>
<?php endif; ?>
                     
                    </ul>
                  </div>
