<div class="a-banner">
    <?php foreach($sources['images'] as $index=>$image): ?>
        <img src="<?php echo $image; ?>" alt="<?php echo $index; ?>" />
        <?php break; ?>
    <?php endforeach; ?>
</div>