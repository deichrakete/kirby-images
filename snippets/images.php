<?php
/**
 * @var Kirby\Cms\File $image
 * @var string $sizes
 * @var string $srcset
 * @var string $title
 * @var string $class
 * @var string $caption
 * @var bool $lazy
 */

use Kirby\Toolkit\Config;

$title ??= '';
$sizes ??= '';
$class ??= '';
$caption ??= '';
$lazy ??= true;

if (!isset($srcset)) {
    throw new Exception('images: you need to add a srcset');
}

if (!isset($image)) {
    throw new Exception('images: image is not defined');
}

if (!($image instanceof Kirby\Cms\File)) {
    throw new Exception('images: image is not type of \Kirby\Cms\File');
};

$config = Config::get('thumbs.srcsets.' . $srcset);

if (!$config) {
    throw new Exception('images: srcset ' . $srcset . ' doesn\'t exist');
}

if (option('deichrakete.images.avif') === true) {
    foreach ($avif = $config as $key => $value) {
        $avif[$key]['format'] = 'avif';
    }
}

if (option('deichrakete.images.webp') === true) {
    foreach ($webp = $config as $key => $value) {
        $webp[$key]['format'] = 'webp';
    }
}
?>

<?php if($image->extension() === 'svg'): ?>
    <figure <?php e($class != '', 'class="' . $class . '"') ?> >
        <img
            alt="<?= $image->alt() ? $image->alt() : $title ?>"
            loading="<?php e($lazy, 'lazy', 'eager') ?>"
            src="<?= $image->url() ?>"
            width="<?= $image->width() ?>"
            height="<?= $image->height() ?>"
        >
        <?php if ($caption != ''): ?>
            <figcaption><?= $caption ?></figcaption>
        <?php endif; ?>
    </figure>
    <?php return; ?>
<?php endif; ?>

<figure <?php e($class != '', 'class="' . $class . '"') ?> >
    <picture>
        <?php if (option('deichrakete.images.avif') === true): ?>
            <source
                srcset="<?= $image->srcset($avif) ?>"
                sizes="<?= $sizes ?>"
                type="image/avif"
            >
        <?php endif; ?>

        <?php if (option('deichrakete.images.webp') === true): ?>
            <source
                srcset="<?= $image->srcset($webp) ?>"
                sizes="<?= $sizes ?>"
                type="image/webp"
            >
        <?php endif; ?>

        <img
            alt="<?= $image->alt() ? $image->alt() : $title ?>"
            loading="<?php e($lazy, 'lazy', 'eager') ?>"
            src="<?= $image->resize(400)->url() ?>"
            srcset="<?= $image->srcset($srcset) ?>"
            sizes="<?= $sizes ?>"
            width="<?= $image->resize(400)->width() ?>"
            height="<?= $image->resize(400)->height() ?>"
        >
    </picture>

    <?php if ($caption != ''): ?>
        <figcaption><?= $caption ?></figcaption>
    <?php endif; ?>
</figure>
