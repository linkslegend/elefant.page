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