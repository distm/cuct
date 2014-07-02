<div class="a-banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding:0;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0; ?>
            <?php foreach($slides['images'] as $index=>$image): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
                <?php $i++; ?>
            <?php endforeach; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php $i = 0; ?>
            <?php foreach($slides['images'] as $index=>$image): ?>
                <div class="item <?php echo ($i == 0 ? 'active' : ''); ?>">
                    <img src="<?php echo $image; ?>" alt="<?php echo $index; ?>" />
                    <?php if(isset($slides['captions'][$index])): ?>
                        <div class="carousel-caption"><?php echo $slides['captions'][$index]; ?></div>
                    <?php endif; ?>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
</div>