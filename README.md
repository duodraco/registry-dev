# Registry

## Leviathan Project

> Registry is a self explained library. 
> It provides a easy to use Registry Pattern Component for your PHP project.
>
> It's make use of PHP 5.4+ features to provide a good and extensible API

### Installation

> TODO

### How to use

```php
/* bootstrap.php */
use Leviathan\Registry\Registry;
$myIniSettings = parse_ini_file(__DIR__.'/path/to/settings.ini');
Registry::fill($myIniSettings);
```
```php
/* library/My/Awesome/DB/Mapper.php */
namespace My\Awesome\DB;

use Leviathan\Registry\Registry;

class Mapper
{
/* ... */
    $db = new \Pdo(
      Registry::get('db.dsn'),
      Registry::get('db.username'),
      Registry::get('db.password'),
      Registry::get('db.options')
    );
/* ... */
```
