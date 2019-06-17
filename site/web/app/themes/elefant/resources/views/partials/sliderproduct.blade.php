<section class="related products">
  <h3>Kunden, die diesen Artikel gekauft haben, kauften auch</h3>
    <ul class="product-slider products columns-4">
  
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
    $current_id = $loop->post->ID;
  ?>

  <li class="product-item type-product">
    <div class="product-inner">
      <a id="id-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      
      <?php 
        if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
        else 
        echo '<img class="lozad" src="" data-src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; 
      ?>

      <h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
      <span class="price"><?php echo $product->get_price_html(); ?></span>
      </a>
      <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

      <?php echo do_shortcode('[woocommerce_quick_view product="'.$current_id.'"]'); ?>


      <?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>

    </div>
  </li>

<?php endwhile; ?>
<?php wp_reset_query(); ?>

</ul>
</section>