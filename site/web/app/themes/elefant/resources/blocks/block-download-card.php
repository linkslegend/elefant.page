<div class="card-outer col-sm-6 col-md-6 col-lg-4">
  <div class="card">
    <div class="card-image">
      <img class="card-img-top" src="<?php block_field( 'image-url' ); ?>" alt="<?php block_field( 'card-title' ); ?>">
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php block_field( 'card-title' ); ?></h5>
      <p class="card-text"><?php block_field( 'card-text' ); ?></p>
    </div>
    <a class="download-button" href="<?php block_field( 'button-url' ); ?>" title="<?php block_field( 'button' ); ?>">
      <div class="card-footer">
        <?php block_field( 'button' ); ?>
        <i class="fas fa-download"></i>
      </div>
    </a>
  </div>
</div>
