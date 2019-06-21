  <div id="preload" class="preload">

    <div class="pre-header">
        <div class="pre-container-inner">
            <div class="pre-header-inner"></div>
        </div>
    </div>

@if (is_shop() || is_product_category())

    <div class="pre-wrap">
        <div class="pre-container-inner">
            <div class="pre-banner">
              <div class="pre-box-filter"></div>
                <div class="pre-product-wrap">
  <div class="pre-product1"><img width="300" height="300" class="image-placeholder" alt="Platzhalter" src="https://d4mtmtvqxh0vf.cloudfront.net/app/uploads/woocommerce-placeholder-300x300.png"><div class="heading-placeholder"></div><div class="price-placeholder"></div></div>
  <div class="pre-product2"><img width="300" height="300" class="image-placeholder" alt="Platzhalter" src="https://d4mtmtvqxh0vf.cloudfront.net/app/uploads/woocommerce-placeholder-300x300.png"><div class="heading-placeholder"></div><div class="price-placeholder"></div></div>
  <div class="pre-product3"><img width="300" height="300" class="image-placeholder" alt="Platzhalter" src="https://d4mtmtvqxh0vf.cloudfront.net/app/uploads/woocommerce-placeholder-300x300.png"><div class="heading-placeholder"></div><div class="price-placeholder"></div></div>
  <div class="pre-product4"><img width="300" height="300" class="image-placeholder" alt="Platzhalter" src="https://d4mtmtvqxh0vf.cloudfront.net/app/uploads/woocommerce-placeholder-300x300.png"><div class="heading-placeholder"></div><div class="price-placeholder"></div></div>
  <div class="pre-product5"><img width="300" height="300" class="image-placeholder" alt="Platzhalter" src="https://d4mtmtvqxh0vf.cloudfront.net/app/uploads/woocommerce-placeholder-300x300.png"><div class="heading-placeholder"></div><div class="price-placeholder"></div></div>
  <div class="pre-product6"><img width="300" height="300" class="image-placeholder" alt="Platzhalter" src="https://d4mtmtvqxh0vf.cloudfront.net/app/uploads/woocommerce-placeholder-300x300.png"><div class="heading-placeholder"></div><div class="price-placeholder"></div></div>
                </div>
              </div>
          </div>
    </div>


@elseif (is_product())

  <div class="pre-wrap">
      <div class="pre-container-inner">
          <div class="pre-banner">
            <div class="pre-box1"></div>
            <div class="pre-box3"></div>
            <div class="pre-box4"></div>
          </div>
        </div>
  </div>

@elseif (is_cart() || is_checkout())

  <div class="pre-wrap">
      <div class="pre-container-inner">
          <div class="pre-banner">
            <div class="pre-cartitem1"></div>
            <div class="pre-cartitem2"></div>
            <div class="pre-cartitem3"></div>
          </div>
        </div>
  </div>

@elseif (is_front_page())

  <div class="pre-wrap">
        <div class="pre-container-inner">
            <div class="pre-banner">
                <div class="pre-box1"></div>
                <div class="pre-box2"></div>
                <div class="pre-box3"></div>
            </div>
        </div>
  </div>

@elseif (is_page_template( 'templates/about.php' ))
  <div class="pre-wrap">
      <div class="pre-container-inner">
          <div class="pre-banner">
              <div class="pre-full"></div>
          </div>
        </div>
  </div>


@elseif (is_page_template( 'views/page-sidebar.blade.php' ))
  <div class="pre-wrap">
      <div class="pre-container-inner">
          <div class="pre-banner test">
              <div class="pre-box1"></div>
              <div class="pre-box2"></div>
            </div>
        </div>
  </div>


@else
  <div class="pre-wrap">
    <div class="pre-container-inner">
        <div class="pre-banner">
          <div class="pre-box1" style="width: 100%;"></div>
        </div>
      </div>
  </div>
@endif

</div>