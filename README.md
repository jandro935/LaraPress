# LaraPress
WordPress CMS + Laravel Framework Together !


### Antes de comenzar
bla bla bla...

### Instalación de WordPress
Dentro del directorio del proyecto (LaraPress) creamos un directorio donde se alojará la instalación de WordPress.

```bash
mkdir wordpress
cd wordpress
composer init
```

Acto seguido debemos introducir el nombre del paquete. Los nombres de los paquetes en Composer suelen ser de la forma nombre_publicador/nombre_paquete. En este caso será jandro935/larapress. Configuramos los demás datos (autor, dependencias, licencias, etc).

Ahora debemos instalar las depencias necesarias. La primera es el propio WordPress:

```bash
composer require johnpbloch/wordpress
```

Este repositorio se actualiza diaramente con las últimas versiones de WordPress.

A continuación creamos un esquema donde se alojarán las tablas del CMS.

Dentro de la carpeta wordpress, entramos a la carpeta wordpress (/LaraPress/wordpress/wordpress) y dentro copiamos el contenido del archivo wp-config-sample.php en otro llamado wp-config.php. Debemos cambiar las siguientes líneas:

```php 
define('DB_NAME', 'database_name_here');
  
/** MySQL database username */
define('DB_USER', 'username_here');
 
/** MySQL database password */
define('DB_PASSWORD', 'password_here');
```

Por esto:

```php
define('DB_NAME', $_ENV['DB_NAME']);

/** MySQL database username */
define('DB_USER', $_ENV['DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
```

A parte de estos cambios, debemos agregar lo siguiente al principio del archivo:

```php
/** Set Front-End URL */
define('WP_HOME', $_ENV['WP_HOME']);

/** Set CMS URL */
define('WP_SITEURL', $_ENV['WP_SITEURL']);
```

Es decir, la constante WP_HOME contiene el valor de la URL del proyecto Laravel, y la constante WP_SITEURL debería tener el valor de la URL de acceso al Back-Office de WordPress.
 
Creamos un archivo .env en el directorio raíz de WordPress (/LaraPress/wordpress), en el que añadimos lo siguiente:

```php
DB_NAME=your_db_name
DB_USER=your_db_user
DB_PASSWORD=your_db_pass
WP_HOME=your_laravel_url
WP_SITEURL=your_back-office_url
```

Otra dependecia recomendada es [phpdotenv](https://github.com/vlucas/phpdotenv). Con ella podemos configurar las variables de configuración del sitio en un archivo .env.

```bash
composer require vlucas/phpdotenv
```

Para poder utilizar las variables de entorno, debemos copiar lo siguiente **al inicio** dentro del archivo wp-load.php (/LaraPress/wordpress/wordpress):

```php
/** Set up dotenv **/
require dirname(__DIR__).'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();
```

Ahora debemos instalar WordPress com tal. Para ello entramos en la URL que hayamos configurado para acceder al back-office, y seguimos los sencillos pasos para instalar el CMS.

### Instalación de Laravel

Dentro del directorio raíz (/LaraPress) creamos un nuevo proyecto Laravel:

```bash
composer create-project laravel/laravel laravel
```

Una vez terminada la instalación, debemos instalar [corcel](https://github.com/corcel/corcel):

```php
composer require jgrossi/corcel
```

Para poner en marcha esto, debemos crear una nueva conexión con la base de datos de WordPress. Para ello, agregamos lo siguiente dentro del archivo config/database.php de nuestro directorio de Laravel (se debe agregar dentro de connections):

```php
'wordpress' => [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => env('WP_DATABASE'),
    'username' => env('WP_USERNAME'),
    'password' => env('WP_PASSWORD'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => 'wp_',
    'strict' => false,
    'engine' => null,
 ],
```
Ahora añadimos la info correspondiente en el archivo .env de la instalción de Laravel (/LaraPress/laravel):

```php
WP_DATABASE=your_wp_db_name
WP_USERNAME=your_wp_db_username
WP_PASSWORD=your_wp_db_pass
```

Con todo esto ya estaríamos en disposición de empezar a utilizar el proyecto. 

#### Pequeño ejemplo de uso:

```bash
cd laravel
php artisan make:model Posts
```

Dentro del modelo creado:

```php
namespace App;

class Posts extends \Corcel\Posts
{
    protected $connection = 'wordpress';
}
```

Con esto indicamos la conexión que vamos a utilizar en este modelo (en este caso para mostrar los posts).

A continuación creamos el controlador:

```bash
php artisan make:controller HomeController
```

Y dentro del controlador creado:

```php
public function index()
{
    $id = 1;
    $data = Posts::findOrFail($id);

    return view('home', compact('data'));
}
```
Con esto mostraremos el post de ejemplo, cuyo id es 1, en una vista llamada home.

Creamos la vista en el directorio correspondiente (laravel/resources/views), y dentro de ella:

```blade
<h1>{{ $data->post_title }}</h1>
<p>{!! $data->post_content !!}</p>
```

Lo último sería crear la ruta (a partir de Laravel 5.3 en routes/web.php):

```php
Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
```

Esto es todo por ahora...

[Fuente 1](https://styde.net/crear-un-sitio-web-con-wordpress-laravel-y-composer-parte-1/) 

[Fuente 2](https://styde.net/crear-un-sitio-web-con-wordpress-laravel-y-composer-parte-2/) 

[Fuente 3](https://github.com/corcel/corcel) 
