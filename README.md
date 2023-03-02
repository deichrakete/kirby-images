# Kirby image plugin

Alternative formats and responsive images

## Installation

### Download

Download and copy this repository to `/site/plugins/images`.

### Git submodule

```
git submodule add https://gitlab.com/foerdeliebe/kirby/images.git site/plugins/images
```

### Composer

```
composer require foerdeliebe/images
```

## Setup

ImageMagick

<!-- Additional instructions on how to configure the plugin (e.g. blueprint setup, config options, etc.) -->

### Configuration

In site/config/config.php
```
return [
  'thumbs' => [
    'driver' => 'im',
    'srcsets' => [
      'default' => [
        '400w'  => ['width' => 400, 'quality' => 80],
        '800w'  => ['width' => 800, 'quality' => 80],
        '1000w'  => ['width' => 1000, 'quality' => 80],
        '1200w' => ['width' => 1200, 'quality' => 80],
       ],
      'avif' => [
        '400w'  => ['width' => 400, 'format' => 'avif'],
        '800w'  => ['width' => 800, 'format' => 'avif'],
        '1000w'  => ['width' => 1000, 'format' => 'avif'],
        '1200w' => ['width' => 1200, 'format' => 'avif'],
      ],
      'webp' => [
        '400w'  => ['width' => 400, 'format' => 'webp'],
        '800w'  => ['width' => 800, 'format' => 'webp'],
        '1000w'  => ['width' => 1000, 'format' => 'webp'],
        '1200w' => ['width' => 1200, 'format' => 'webp'],
      ],
    ]
  ]
];

```
### Templating

```
<?php snippet('images', [
  'image' => $image,
  'title' => $title,
  'sizes' => '(min-width: 800px) 33vw, 50vw',
  'class' => 'image',
]) ?>

```

## Options

<!-- Document the options and APIs that this plugin offers -->

## Development

<!-- Add instructions on how to help working on the plugin (e.g. npm setup, Composer dev dependencies, etc.) -->

## License

MIT

## Credits

- [Diana Gerken](https://getkirby.com/plugins/foerdeliebe)



