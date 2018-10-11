# Nova Auditing User Fields

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coreproc/nova-auditing-user-fields.svg?style=flat-square)](https://packagist.org/packages/coreproc/nova-auditing-user-fields)
[![Total Downloads](https://img.shields.io/packagist/dt/coreproc/nova-auditing-user-fields.svg?style=flat-square)](https://packagist.org/packages/coreproc/nova-auditing-user-fields)

A Laravel Nova field that works with the [Laravel Auditing](https://github.com/owen-it/laravel-auditing) package to see who created or last updated a resource. 

![nova auditing user fields screenshot](https://cdn.coreproc.com/images/nova-auditing-user-fields.jpg)

## Installation

You can install the package in to a Laravel app that uses [Laravel Nova](https://nova.laravel.com) and the [Laravel Auditing](https://github.com/owen-it/laravel-auditing) package via composer:

```bash
composer require coreproc/nova-auditing-user-fields
```

## Usage

Once installed, you can begin using the `CreatedBy` and `UpdatedBy` fields inside a resource.

Please take note that the model of the resource should be using the `Auditable` trait and implements the `Auditable` contract as explained in the Laravel Auditing package: [http://laravel-auditing.com/docs/8.0/model-setup](http://laravel-auditing.com/docs/8.0/model-setup).    

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    // ...
}
```

And in your resource:

```php
<?php

use Coreproc\NovaAuditingUserFields\CreatedBy;
use Coreproc\NovaAuditingUserFields\UpdatedBy;
use Illuminate\Http\Request;

class User extends Resource
{
    // ...
    
    public function fields(Request $request)
    {
        return [
            // ...
            
            CreatedBy::make('Created By'),
            
            UpdatedBy::make('Updated By')->onlyOnDetail(),
            
            // ...
        ];
    }
}
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email chris.bautista@coreproc.ph instead of using the issue tracker.

## Credits

- [Chris Bautista](https://github.com/chrisbjr)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
