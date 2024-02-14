# Kirby image plugin

Alternative formats and responsive images

This plugin is wip!

## Installation

### Download

Download and copy this repository to `/site/plugins/images`.

### Git submodule

```
git submodule add https://github.com/foerdeliebe/kirby-images.git site/plugins/images
```

### Composer

```
composer require foerdeliebe/kirby-images
```

## Setup

### Configuration

In site/config/config.php
```php
return [
  'foerdeliebe.images.avif' => true, // AVIF Support - false is default
  'foerdeliebe.images.webp' => true, // WEBP Support - false is default
  'thumbs' => [
    'driver' => 'im', // optional - ImageMagick has better avif support
    'srcsets' => [
      'teaser' => [
        '400w'  => ['width' => 400, 'height' => 200, 'crop' => true, 'quality' => 85],
        '800w'  => ['width' => 800, 'height' => 400, 'crop' => true, 'quality' => 85],
        '1000w' => ['width' => 1000, 'height' => 500, 'crop' => true, 'quality' => 85],
        '1200w' => ['width' => 1200, 'height' => 600, 'crop' => true, 'quality' => 85],
      ],
      'slide' => [
        '400w'  => ['width' => 400, 'quality' => 85],
        '800w'  => ['width' => 800, 'quality' => 85],
        '1000w' => ['width' => 1000, 'quality' => 85],
        '1200w' => ['width' => 1200, 'quality' => 85],
      ],
    ]
  ]
];

```
### Templating

```php
<?php snippet('images', [
  'image' => $image, # Kirby\Cms\File
  'title' => 'Another slide image', # optional
  'sizes' => '(min-width: 800px) 33vw, 50vw', # optional
  'srcset' => 'slide', # required
  'caption' => 'A caption that describes the image', # optional
  'class' => 'first-slide', # optional
  'lazy' => false, # optional
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



