<div class="social-icons flex-center">
  <small><strong>Share:</strong></small>
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&quote=Check out this <?php echo get_the_title(); ?>" target="_blank" rel="noreferrer" title="Share on Facebook">
    <?php require(get_template_directory().'/assets/img/icon-facebook.svg'); ?>
  </a>
  <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" target="_blank" rel="noreferrer" title="Share of Twitter">
    <?php require(get_template_directory().'/assets/img/icon-twitter.svg'); ?>
  </a>
  <a href="javascript:;" title="Click to copy" class="click-to-copy">
    <?php require(get_template_directory().'/assets/img/icon-permalink.svg'); ?>
  </a>
</div>
