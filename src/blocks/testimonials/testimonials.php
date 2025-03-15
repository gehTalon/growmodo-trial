<?php

$id = 'testimonials ' . $block['id'];
$className = 'testimonials';
?>
<section id="<?= $id ?>" class="<?= $className ?>">
  <div class="container">
    <div class="section-header d-flex justify-content-between align-items-center">
      <div class="section-text">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/highlighted.png" alt="highlighted">
        <?php if ($heading = get_field('heading')) : ?>
          <h2><?= esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if ($details = get_field('sub_heading')) : ?>
          <p><?= esc_html($details); ?></p>
        <?php endif; ?>
      </div>

      <?php if ($link = get_field('link')) :
        $url    = $link['url'];
        $title  = $link['title'];
        $target = $link['target'] ?: '_self';
      ?>
        <div class="section-btn">
          <a href="<?= esc_url($url); ?>" class="cta-button transparent" target="<?= esc_attr($target); ?>">
            <?= esc_html($title); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>
    <div class="section-content">
      <div class="carousel-copy-swiper">
        <?php if ($testimonials = get_field('select_testimonial')) : ?>
          <div class="swiper-wrapper">
            <?php foreach ($testimonials as $item) :
              $testimonial_id = $item['testimony'] ?? null;
              if (!$testimonial_id) continue; // Skip if property ID is missing

              $link_url = get_permalink($testimonial_id);
              $title    = get_the_title($testimonial_id);
              $image    = get_the_post_thumbnail_url($testimonial_id, 'medium');
              $top_title = $item['top_title'] ?? ''; // Avoid undefined index errors
              $testimonial_details = get_field('description', $testimonial_id);
              $heading = get_field('heading', $testimonial_id);
              $testimony = get_field('testimony', $testimonial_id);
              $location = get_field('location', $testimonial_id);
            ?>
              <div class="swiper-slide">
                

                <div class="content">
                  <?php if (!empty($top_title)) : ?>
                    <em><?= esc_html($top_title); ?></em>
                  <?php endif; ?>
                  <div class="testimonial-holder">                    
                    <div class="testimonial-info">
                      <img src="<?= get_template_directory_uri(); ?>/assets/images/rating-star.png" class="rating" alt="rating">
                      <h4 class="font-heading4"><?= esc_html($heading); ?></h4>
                      <p><?= esc_html($testimony); ?></p>
                    </div>
                    <div class="testimonial-bottom-info">
                      <?php if ($image) : ?>
                        <img src="<?= esc_url($image); ?>" alt="<?= esc_attr($title); ?>" class="testimonial-image" />
                      <?php endif; ?>
                      <div class="testimonial-name">
                        <span class="name"><?= esc_html($title); ?></span>
                        <span class="location"><?= esc_html($location); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="testimonials-bottom-content d-flex justify-content-between">
          <div class="testimonials-pagination d-flex">
            <div class="testimonials-pagination-bullets"><span class="current-bullet">01</span> of 10</div>          
          </div>
          <div class="carousel-navigation d-flex">
            <div class="swiper-prev">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5 15C25.5 15.6213 24.9963 16.125 24.375 16.125L8.41812 16.125L14.6547 22.0641C15.1026 22.4947 15.1166 23.2069 14.6859 23.6548C14.2553 24.1026 13.5431 24.1166 13.0953 23.6859L4.84525 15.8109C4.62466 15.5988 4.5 15.306 4.5 15C4.5 14.694 4.62466 14.4012 4.84525 14.1891L13.0953 6.31406C13.5431 5.88342 14.2553 5.89739 14.6859 6.34525C15.1166 6.79312 15.1026 7.5053 14.6547 7.93594L8.41812 13.875L24.375 13.875C24.9963 13.875 25.5 14.3787 25.5 15Z" fill="#808080" />
              </svg>
            </div>
            <div class="swiper-next">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 15C4.5 14.3787 5.00368 13.875 5.625 13.875L21.5819 13.875L15.3453 7.93593C14.8974 7.50529 14.8834 6.79312 15.3141 6.34525C15.7447 5.89738 16.4569 5.88342 16.9047 6.31406L25.1547 14.1891C25.3753 14.4012 25.5 14.694 25.5 15C25.5 15.306 25.3753 15.5988 25.1547 15.8109L16.9047 23.6859C16.4569 24.1166 15.7447 24.1026 15.3141 23.6547C14.8834 23.2069 14.8974 22.4947 15.3453 22.0641L21.5819 16.125L5.625 16.125C5.00368 16.125 4.5 15.6213 4.5 15Z" fill="white" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>