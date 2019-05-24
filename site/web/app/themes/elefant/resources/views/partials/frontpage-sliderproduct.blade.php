<section class="middle-banner">
  <div class="container-fluid">
  <div class="d-flex flex-row row">
    <div class="col-12 flex-fill my-flex-item">
    <div class="content-box">
  <h2 class="title">Unsere Shop Angebote</h2>
    <ul class="product-slider-frontpage products columns-4">
  
  <?php
      $args = array(
      'post_type' => 'product',
      'stock' => 1,
      'posts_per_page' => 8,
      'orderby' =>'date',
      'order' => 'DESC'
    );

    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); global $product;
    $current_id = $product->ID;

  ?>

  <li class="product-item">
    <div class="product-inner">
      <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      
      <?php 
        if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
        else 
        echo '<img class="lozad" src="" data-src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; 
      ?>

      <h3 class="product-title"><?php the_title(); ?></h3>
      <span class="price"><?php echo $product->get_price_html(); ?></span>
      </a>
      <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

      <a href="#" class="button quick-view-button btn button btn-default theme-button theme-btn" data-product-id="<?php the_id(); ?>" rel="nofollow">
        <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
      </svg><!-- <i class="fas fa-search"></i> --> Schnell Ansicht</a>

      <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
    </div>
  </li>

<?php endwhile; ?>
<?php wp_reset_query(); ?>

</ul>
</div>
</div>
</div>
</div>
</section>