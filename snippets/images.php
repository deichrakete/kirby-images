<?php
/**
 * @var Kirby\Filesystem\File $image
 * @var string $sizes
 * @var string $title
 * @var string $class
 */

if (!isset($title)) {
    $title = '';
}
if (!isset($sizes)) {
    $sizes = '';
}
if (!isset($class)) {
    $class = '';
}
?>

<figure <?php e($class != '', 'class="' . $class . '"') ?> >
    <picture>
        <?php // NOTE: avif can´t handle png alpha channel with ImageMagick 6, just with ImageMagick 7 ?>
        <?php if ($image->mime() != 'image/png') : ?>
            <source
                srcset="<?= $image->srcset('avif') ?>"
                sizes="<?= $sizes ?>"
                type="image/avif"
            >
        <?php endif ?>
        <source
            srcset="<?= $image->srcset('webp') ?>"
            sizes="<?= $sizes ?>"
            type="image/webp"
        >
        <img
            alt="<?= $image->alt() ? $image->alt() : $title ?>"
            loading="lazy"
            src="<?= $image->resize(400)->url() ?>"
            srcset="<?= $image->srcset() ?>"
            sizes="<?= $sizes ?>"
            width="<?= $image->resize(1200)->width() ?>"
            height="<?= $image->resize(1200)->height() ?>"
        >
    </picture>
</figure>
