 <section class="top-links">
      <div class="container">
        <div class="desktop-top-blog-links">
        <ul class="sf-blog-toplinks-ul">
        <li><a href="<?php echo site_url();?>">All</a></li>
        <?php  $taxonomy = 'category';
 
 echo wp_list_categories(
   array(
     'show_count'   => false,
   'pad_counts'   => false,
   'use_desc_for_title' => false,
   'title_li'=>'',
   'hierarchical' =>false)
 );
 ?>
 </ul>

        
        </div>

        <div class="mobile-top-blog-links" >
        <?php wp_dropdown_categories(   array(

'show_option_all'=>'All',
  'show_count'   => false,
  'class'            => 'myselect form-control form-control-sm'


) ); ?>
          
        </div>
      </div>
    </section>
