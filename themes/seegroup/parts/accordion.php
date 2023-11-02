<?php if ($accordion): ?>
  <div class="accordion-list">
    <?php foreach ($accordion as $item): ?>
      <div class="accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <h5 class="toggle" itemprop="name"><?php echo $item['title']; ?></h5>
        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="general-content">
          <br><?php echo $item['content']; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
