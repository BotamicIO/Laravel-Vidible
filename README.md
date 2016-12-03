# Laravel Vidible

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-vidible
```

And then include the service provider within `app/config/app.php`.

``` php
BrianFaust\Vidible\VidibleServiceProvider::class
```

To get started, you'll need to publish the vendor assets and modify it:

```bash
php artisan vendor:publish --provider="BrianFaust\Vidible\VidibleServiceProvider"
```

The package configuration will now be located at `app/config/vidible.php` and the migration at `database/migrations/2015_01_30_000000_create_vidible_table.php`.

To finish the installation you need to migrate the vidible table by executing:

```bash
php artisan migrate
```

## Usage

``` php
<?php

namespace App\Http\Controllers;

use App\User;
use BrianFaust\Vidible\VidibleService as Vidible;
use Illuminate\Http\Request;

class VidibleController extends Controller {

    public function index(Request $request, Vidible $vidible)
    {
        // Load the model the video will be attached to
        $user = User::find(1);

        // The video that should be uploaded
        $file = $request->files->all()['video'];

        // Upload the video and create a database record
        $video = $vidible->withFile($file)
                         ->withModel($user)
                         ->withAttributes(['slot' => 'trailer'])
                         ->withFilters(['watermark'])
                         ->commit(true);

        // Get the shareable url of the created video
        $video = $vidible->withFilters(['watermark'])
                         ->getShareableLink($video);

        // Display the shareable url
        echo($video);
    }

}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)

<!-- ## To-Do
- Implement **Batch processing** with an easy to use syntax.
- Implement **Move to Slot** with an easy to use syntax.
- Implement **getShareableLink** for the following adapters
    - Azure
    - Copy
    - Ftp
    - GridFs
    - Rackspace
    - Sftp
    - WebDav
    - ZipArchive
- Refactoring and Package structuring
- Write more about how to use the package
- Write more descriptive comments -->
