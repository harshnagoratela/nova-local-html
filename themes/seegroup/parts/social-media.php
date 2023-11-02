<?php if ($social_media): ?>
  <div class="social-icons flex flex-align-center">
    <?php foreach ($social_media as $media): ?>
      <a href="<?php echo $media['url']; ?>" target="_blank" rel="noopener noreferrer" title="Find us on <?php echo $media['platform']['label']; ?>">
        <?php require(get_template_directory().'/assets/img/icon-'.$media['platform']['value'].'.svg'); ?>
      </a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
