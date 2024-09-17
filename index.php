<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('deichrakete/images', [
    'options' => [
        'avif' => false,
        'webp' => false,
    ],
    'snippets' => [
        'images' => __DIR__ . '/snippets/images.php',
    ],
]);
