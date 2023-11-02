<?php if (have_rows('flexible_layout')): while (have_rows('flexible_layout')): the_row(); ?>

  <?php if (get_row_layout() == 'one_column'):
    $background = get_sub_field('background_colour');
    $content = get_sub_field('content');
    $button = get_sub_field('button'); ?>
    <div class="section-content section-padding <?php echo ($background ? 'background-'.$background : ''); ?>">
      <div class="container-medium columns-1">
        <?php if ($content): ?>
          <div class="general-content">
            <?php echo $content; ?>
            <?php if ($button): ?>
              <div class="button-group">
                <a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" title="<?php echo $button['title']; ?>">
                  <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                  <?php echo $button['title']; ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'columns'):
    $background = get_sub_field('background_colour');
    $content = get_sub_field('content');
    $add_columns = get_sub_field('add_columns'); ?>
    <div class="section-content<?php echo (count($add_columns) >= 2 ? '-columns' : ''); ?> section-padding <?php echo ($background ? 'background-'.$background : ''); ?>">
      <div class="container-medium columns-1">
        <?php if ($content): ?>
          <div class="general-content">
            <?php echo $content; ?>
          </div>
        <?php endif; ?>

        <?php if ($add_columns): ?>
          <div class="columns-2 flex-align-center">
            <?php foreach ($add_columns as $col):
              $left_content = $col['left_content'];
              $left_button = $col['left_button'];
              $right_content = $col['right_content'];
              $right_button = $col['right_button'];  ?>
              <?php if ($col['left_content']): ?>
                <div class="general-content">
                  <?php echo $col['left_content']; ?>
                  <?php if ($col['left_button']): ?>
                    <div class="button-group">
                      <a class="button" href="<?php echo $col['left_button']['url']; ?>" target="<?php echo $col['left_button']['target']; ?>" title="<?php echo $col['left_button']['title']; ?>">
                        <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                        <?php echo $col['left_button']['title']; ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <?php if ($col['right_content']): ?>
                <div class="general-content">
                  <?php echo $col['right_content']; ?>
                  <?php if ($col['right_button']): ?>
                    <div class="button-group">
                      <a class="button" href="<?php echo $col['right_button']['url']; ?>" target="<?php echo $col['right_button']['target']; ?>" title="<?php echo $col['right_button']['title']; ?>">
                        <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                        <?php echo $col['right_button']['title']; ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'accordion'):
    $background = get_sub_field('background_colour');
    $content = get_sub_field('content');
    $accordion = get_sub_field('add_accordion'); ?>
    <div class="section-accordion section-padding <?php echo ($background ? 'background-'.$background : ''); ?>">
      <div class="container-medium columns-1">
        <?php if ($content): ?>
          <div class="general-content">
            <?php echo $content; ?>
          </div>
        <?php endif; ?>
        <?php include(get_template_directory().'/parts/accordion.php'); ?>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'timeline'):
    $add_timeline = get_sub_field('add_timeline');?>
    <div class="section-timeline">
      <div class="timeline-list">
        <?php $i = 0; foreach ($add_timeline as $timeline): $i++; ?>
          <div class="timeline-item <?php if ($i === 1): echo 'first-item'; elseif ($i === count($add_timeline)): echo 'last-item'; endif; ?>">
            <div class="container-medium">
              <div class="item-point"></div>
              <div class="columns-2">
                <div class="general-content">
                  <?php echo $timeline['content']; ?>
                </div>
                <div class="general-content">
                  <img src="<?php echo $timeline['image']['url']; ?>" alt="<?php echo $timeline['image']['alt']; ?>">
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'gallery'):
    $gallery = get_sub_field('gallery'); ?>
    <div class="section-gallery spacing">
      <div class="container-xlarge">
        <div class="slider-navigation flex flex-gap">
          <div class="slider-button-prev"></div>
          <div class="slider-button-next"></div>
        </div>
        <div class="swiper image-slider">
          <div class="swiper-wrapper">
            <?php foreach ($gallery as $img): ?>
              <img class="swiper-slide" src="<?php echo $img['sizes']['gallery-thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'projects'):
    $background = get_sub_field('background_colour');
    $content = get_sub_field('content');
    $add_projects = get_sub_field('add_projects'); ?>
    <div class="section-project-slider columns-1 section-padding <?php echo ($background ? 'background-'.$background : ''); ?>">
      <?php if ($content): ?>
        <div class="container-small general-content">
          <?php echo $content; ?>
        </div>
      <?php endif; ?>

      <div class="container-xlarge">
        <?php if (count($add_projects) >= 5): ?>
          <div class="swiper posts-slider">
            <div class="swiper-wrapper">
              <?php foreach ($add_projects as $item): $post_ID = $item; ?>
                <div class="swiper-slide">
                  <?php include(get_template_directory().'/parts/project-item.php'); ?>
                </div>
              <?php endforeach; wp_reset_postdata(); ?>
            </div>
          </div>
        <?php else: ?>
          <div class="project-list columns-3">
            <?php foreach ($add_projects as $item): $post_ID = $item; ?>
              <?php include(get_template_directory().'/parts/project-item.php'); ?>
            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if (count($add_projects) >= 5): ?>
        <div class="container-small slider-meta flex flex-align-center">
          <div class="slider-navigation flex flex-gap">
            <div class="slider-button-prev"></div>
            <div class="slider-button-next"></div>
          </div>
          <div class="swiper-pagination"></div>
          <a href="<?php echo get_permalink(62); ?>" class="button">
            <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
            View all
          </a>
        </div>
      <?php else: ?>
        <div class="container-small slider-meta flex flex-justify-center flex-align-center">
          <a href="<?php echo get_permalink(62); ?>" class="button">
            <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
            View all
          </a>
        </div>
      <?php endif; ?>
    </div>

  <?php elseif (get_row_layout() == 'people'):
    $background = get_sub_field('background_colour');
    $content = get_sub_field('content');
    $add_people = get_sub_field('add_people'); ?>
    <div class="section-people section-padding <?php echo ($background ? 'background-'.$background : ''); ?>">
      <div class="columns-1">
        <?php if ($content): ?>
          <div class="container-xsmall general-content">
            <?php echo $content; ?>
          </div>
        <?php endif; ?>

        <div class="container-medium people-list columns-4">
          <?php if($add_people) { $i = 0; foreach ($add_people as $people): $i++;
            $image = get_the_post_thumbnail_url($people, 'profile-thumbnail');
            $position = get_field('position_title', $people);
            $phone_number = get_field('phone_number', $people);
            $email_address = get_field('email_address', $people);
            $linkedin = get_field('linkedin', $people); ?>
            <div class="people-item popup-trigger" data-popup-name="people-popup-<?php echo $i; ?>">
              <div class="item-meta flex flex-align-end">
                <div>
                  <h5><?php echo get_the_title($people); ?></h5>
                  <?php if ($position): ?>
                    <p><small><?php echo $position; ?></small></p>
                  <?php endif; ?>
                </div>
                <?php require(get_template_directory().'/assets/img/icon-plus.svg'); ?>
              </div>
              <?php if ($image): ?>
                <img src="<?php echo $image; ?>" alt="<?php echo get_the_title($people); ?>">
              <?php endif; ?>
            </div>

            <div class="popup-container" id="people-popup-<?php echo $i; ?>">
              <div class="popup-wrap">
                <div class="container-medium">
                  <div class="popup-close"><?php require(get_template_directory().'/assets/img/icon-cross.svg'); ?></div>
                  <div class="columns-2">
                    <div class="general-content">
                      <?php if ($image): ?>
                        <img src="<?php echo $image; ?>" alt="<?php echo get_the_title($people); ?>">
                      <?php endif; ?>

                      <div class="social-icons flex flex-align-center">
                        <?php if ($phone_number): ?>
                          <a href="tel:<?php echo $phone_number; ?>" target="_blank" title="Call <?php echo get_the_title($people); ?>">
                            <?php require(get_template_directory().'/assets/img/icon-phone.svg'); ?>
                          </a>
                        <?php endif; ?>
                        <?php if ($email_address): ?>
                          <a href="mailto:<?php echo $email_address; ?>" target="_blank" title="Email <?php echo get_the_title($people); ?>">
                            <?php require(get_template_directory().'/assets/img/icon-mail.svg'); ?>
                          </a>
                        <?php endif; ?>
                        <?php if ($linkedin): ?>
                          <a href="<?php echo $linkedin; ?>" target="_blank" title="Connect to <?php echo get_the_title($people); ?> on Linkedin">
                            <?php require(get_template_directory().'/assets/img/icon-linkedin.svg'); ?>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>

                    <div class="general-content">
                      <h4><?php echo get_the_title($people); ?></h4>
                      <?php if ($position): ?>
                        <p class="muted"><?php echo $position; ?></p>
                      <?php endif; ?>
                      <?php echo apply_filters('the_content', get_post($people)->post_content); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; } ?>
        </div>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'capabilities'):
    $background = get_sub_field('background_colour');
    $content = get_sub_field('content');
    $add_capability = get_sub_field('add_capability'); ?>
    <div class="section-accordion section-padding <?php echo ($background ? 'background-'.$background : ''); ?>">
      <div class="container-medium columns-1">
        <?php if ($content): ?>
          <div class="general-content">
            <?php echo $content; ?>
          </div>
        <?php endif; ?>

        <div class="columns-2">
          <div class="columns-1">
            <?php $count = round(count($add_capability) / 2); $i = 0; foreach ($add_capability as $item): ?>
              <?php if ($i == $count): ?></div><div class="columns-1"><?php endif; ?>
              <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h5 class="toggle flex flex-align-center flex-gap" itemprop="name">
                  <?php if ($item['icon']): ?>
                    <img src="<?php echo $item['icon']['url']; ?>" alt="<?php echo $item['title']; ?>">
                  <?php endif; ?>
                  <?php echo $item['title']; ?>
                </h5>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="general-content">
                  <br><?php echo $item['content']; ?>
                </div>
              </div>
            <?php $i++; endforeach; ?>
          </div>
        </div>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'logos'):
    $add_logos = get_sub_field('add_logos'); ?>
    <div class="section-logos section-padding-top">
      <div class="container-xlarge flex flex-align-center">
        <?php foreach ($add_logos as $logo): ?>
          <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
        <?php endforeach; ?>
      </div>
    </div>

  <?php elseif (get_row_layout() == 'pdf_download'):
    $image = get_sub_field('image');
    $content = get_sub_field('content');
    $button = get_sub_field('button'); ?>
    <div class="section-pdf-cta">
      <div class="container-xsmall">
        <div class="flex flex-align-center">
          <?php if ($image): ?>
            <img src="<?php echo $image['sizes']['square-thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
          <?php endif; ?>

          <div class="general-content">
            <?php echo ($content ? $content : ''); ?>
            <?php if ($button): ?>
              <div class="button-group">
                <a class="button button-dark" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" title="<?php echo $button['title']; ?>">
                  <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
                  <?php echo $button['title']; ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  <?php endif; ?>

<?php endwhile; endif; ?>
