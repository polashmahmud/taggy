# Taggy - Laravel Tagging Package

Taggy is a Laravel package that provides tagging functionality for your Eloquent models. Easily add and manage tags for
your models with this simple and flexible package.

## Features

- **Tagging**: Associate tags with your Eloquent models.
- **Taggable Trait**: Easily make your models taggable using the Taggable trait.

## Installation

To install Taggy, simply run:

```bash
composer require polashmahmud/taggy
```

Then, publish the migration file and migrate your database:

```bash
php artisan vendor:publish --tag=taggy-migrations
php artisan migrate
```

## Usage

### Tagging Models

To make a model taggable, use the `Polash\Taggy\Taggable` trait on the model:

```php
use Polash\Taggy\Taggable;

class Post extends Model
{
    use Taggable;
}
```

### Tagging Items

To tag an item, use the `tag()` method on the model:

```php
$post = Post::find(1);

$post->tag('Laravel');
$post->tag(['Laravel', 'PHP']);
```

### Untagging Items

To remove a tag from an item, use the `untag()` method on the model:

```php
$post = Post::find(1);

$post->untag('Laravel');
$post->untag(['Laravel', 'PHP']);
```

### Retagging Items

To remove all tags from an item and add new tags, use the `retag()` method on the model:

```php
$post = Post::find(1);

$post->retag('Laravel');
$post->retag(['Laravel', 'PHP']);
```

### Tagging Scopes

Taggy provides a few useful query scopes for working with tags:

```php
// Get all posts tagged with 'Laravel'
$posts = Post::withAllTags('Laravel')->get();

// Get all posts tagged with any of 'Laravel' or 'PHP'
$posts = Post::withAnyTags(['Laravel', 'PHP'])->get();

// Get all posts tagged with any of 'Laravel' or 'PHP' and published in 2019
$posts = Post::withAnyTags(['Laravel', 'PHP'])->whereYear('published_at', 2019)->get();

// Get all posts tagged with any of 'Laravel' or 'PHP' and published in 2019 or 2020
$posts = Post::withAnyTags(['Laravel', 'PHP'])->whereBetween('published_at', [2019, 2020])->get();

// Get all posts tagged with any of 'Laravel' or 'PHP' and published in 2019 or 2020, ordered by the number of tags
$posts = Post::withAnyTags(['Laravel', 'PHP'])->whereBetween('published_at', [2019, 2020])->orderByTags()->get();

// Get all posts tagged with any of 'Laravel' or 'PHP' and published in 2019 or 2020, ordered by the number of tags, with a limit of 10
$posts = Post::withAnyTags(['Laravel', 'PHP'])->whereBetween('published_at', [2019, 2020])->orderByTags()->limit(10)->get();
```

## Contributing

Thank you for considering contributing to Taggy! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

Taggy is open-sourced software licensed under the [MIT license](LICENSE.md).


