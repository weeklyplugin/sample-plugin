  <section class="top-links">
      <div class="container">
        <div class="desktop-top-blog-links">
        <ul class="sf-blog-toplinks-ul">
        <li><a href="https://selectedfirms.co/blog">All</a></li>
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
