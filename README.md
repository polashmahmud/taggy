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

Then, migrate your database:

```bash
php artisan migrate
```

## Usage

### Tagging Models

To make a model taggable, use the `Polashmahmud\Taggy\Taggable` trait on the model:

```php
use Polashmahmud\Taggy\Taggable;

class Post extends Model
{
    use Taggable;
}
```

### Creating Tags

To create a tag, use the `create()` method on the `Polashmahmud\Taggy\Models\Tag` model:

```php
use Polashmahmud\Taggy\Models\Tag;

$tag = Tag::create([
    'name' => 'Laravel',
    'slug' => 'laravel',
]);
```

### Tagging Items

To tag an item, use the `tag()` method on the model, passing in the tag name or slug as a array:

```php
$post = Post::find(1);

$post->tag(['Laravel']);
$post->tag(['Laravel', 'PHP']);
```

also you can pass tag:

```php
$post = Post::find(1);
$tag = Tag::find(1);

$post->tag($tag);
```

### Untagging Items

To remove a tag from an item, use the `untag()` method on the model:

```php
$post = Post::find(1);

$post->untag('Laravel');
$post->untag(['Laravel', 'PHP']);
```

Remove all tags from an item:

```php
$post = Post::find(1);

$post->untag();
```

### Retagging Items

To remove all tags from an item and add new tags, use the `retag()` method on the model:

```php
$post = Post::find(1);

$post->retag(['Laravel']);
$post->retag(['Laravel', 'PHP']);
```

### Tagging Scopes

Taggy provides a few useful query scopes for working with tags:

```php
// Get all posts tagged with 'Laravel' and 'PHP'
$posts = Post::withAnyTag(['laravel', 'php'])->get();

// Get common tags for all posts
$posts = Post::withAllTags(['Laravel', 'PHP'])->get();

// GreaterThanEqual and LessThanEqual scopes
$tags = Tag::usedGreaterThanEqual(10)->get();
$tags = Tag::usedGreaterThen(10)->get();
$tags = Tag::usedLessThanEqual(10)->get();
$tags = Tag::usedLessThan(10)->get();

```

## Contributing

Thank you for considering contributing to Taggy! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

Taggy is open-sourced software licensed under the [MIT license](LICENSE.md).


