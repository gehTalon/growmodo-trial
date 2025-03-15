<section class="cta-section">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-center">
            <div class="section-text">
                <?php if ($heading = get_field('heading')) : ?>
                    <h2><?= esc_html($heading); ?></h2>
                <?php endif; ?>

                <?php if ($details = get_field('details')) : ?>
                    <p><?= esc_html($details); ?></p>
                <?php endif; ?>
            </div>
            
            <?php if ($link = get_field('link')) : 
                $url    = $link['url'];
                $title  = $link['title'];
                $target = $link['target'] ?: '_self';
            ?>
                <div class="section-btn">
                    <a href="<?= esc_url($url); ?>" class="cta-button" target="<?= esc_attr($target); ?>">
                        <?= esc_html($title); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
