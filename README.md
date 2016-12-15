# LaraPress
WordPress CMS + Laravel Framework Together !


### Antes de comenzar
bla bla

### Instalación de WordPress
Dentro del directorio del proyecto (LaraPress) creamos un directorio donde se alojará la instalación de WordPress.

> - mkdir wordpress
> - cd wordpress
> - composer init

Acto seguido debemos introducir el nombre del paquete. Los nombres de los paquetes en Composer suelen ser de la forma nombre_publicador/nombre_paquete. En este caso será jandro935/larapress. Configuramos los demás datos (autor, dependencias, licencias, etc).

Ahora debemos instalar las depencias necesarias. La primera es el propio WordPress:

> composer require johnpbloch/wordpress

Este repositorio se actualiza diaramente con las últimas versiones de WordPress.

A continuación creamos un esquema donde se alojarán las tablas del CMS.

Dentro de la carpeta wordpress, entramos a la carpeta wordpress (/LaraPress/wordpress/wordpress) y dentro copiamos el contenido del archivo wp-config-sample.php en otro llamado wp-config.php. Debemos cambiar las siguientes líneas:
 
> define('DB_NAME', 'database_name_here');
>  
> /** MySQL database username */
>
> define('DB_USER', 'username_here');
> 
> /** MySQL database password */
>
> define('DB_PASSWORD', 'password_here');

Por esto:

> define('DB_NAME', $_ENV['DB_NAME']);
>  
> /** MySQL database username */
>
> define('DB_USER', $_ENV['DB_USER']);
>  
> /** MySQL database password */
>
> define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

A parte de estos cambios, debemos agregar lo siguiente al principio del archivo:

> /** Set Front-End URL */
>
> define('WP_HOME', $_ENV['WP_HOME']);
>
> /** Set CMS URL */
>
> define('WP_SITEURL', $_ENV['WP_SITEURL']);

... En construcción
