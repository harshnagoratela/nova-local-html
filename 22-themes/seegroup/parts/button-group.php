<?php if ($button_group): ?>
  <div class="button-group">
    <?php foreach ($button_group as $button): ?>
      <a class="button button-white" href="<?php echo $button['button']['url']; ?>" target="<?php echo $button['button']['target']; ?>" title="<?php echo $button['button']['title']; ?>">
        <?php require(get_template_directory().'/assets/img/icon-arrow-sm.svg'); ?>
        <?php echo $button['button']['title']; ?>
      </a>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
