# Proyecto DWES: Modelo Vista Controlador - Desarrollo por Fases

Este proyecto se realizará de forma incremental, dividido en fases. Cada fase tiene objetivos claros que deben cumplirse antes de pasar a la siguiente. Se trabajará siguiendo buenas prácticas y aprendiendo a gestionar un proyecto con Composer, MVC, y Git.

---

## **Estructura de las Fases**

- **Fase 0:** Familiarización con el entorno de trabajo.  
- **Fase 1:** Configuración inicial del proyecto y base de datos.  
- **Fase 2:** Enrutamiento y punto de acceso único.  
- **Fase 3:** Creación de vistas (login, página principal, otros).
- **Fase 4:** Gestión de la Base de Datos. Controlador y modelo del login.
- **Fase 5:** Gestión de Sesiones. Usuario autenticado.  
- **Fase 6:** Gestión de productos (nuevo controlador, modelo y vistas).
- **Fases futuras:** Serán definidas conforme avance el proyecto.

---

## **Fase 0: Familiarización con el entorno**

Objetivo: Configurar el entorno inicial del proyecto y entender el flujo de trabajo en GitHub.

### 1. **Clonar el repositorio**:
   ```bash
   git clone [URL del repositorio]
   ```

### 2. **Crear una rama para esta fase**:
   ```bash
   git checkout -b fase-0
   ```
### 3. **añadir un archivo al proyecto**:
   
   Añade el archivo index.php con el texto "Hola Mundo"
   
   
### 4. **Subir los cambios:**
   ```bash
   git add .
   git commit -m "Configuración inicial del proyecto"
   git push origin fase-0
   ```

### 5. Crear un **Pull Request (PR)** para fusionar la rama `fase-0` en `main`.

---

## **Fase 1: Configuración inicial y estructura del proyecto**

Objetivo: Crear la estructura inicial del proyecto, la base de datos, y configurar Composer para gestionar espacios de nombres.

**Crear una rama para esta fase**:
   ```bash
   git checkout -b fase-1
   ```

### 1. **Estructura inicial del proyecto**

Configura la siguiente estructura de carpetas y archivos:

```
- app
  ├── controllers
  │   ├── HomeController.php
  │   ├── LoginController.php
  │   └── TaskController.php
  ├── models
  │   ├── LoginModel.php
  │   └── TaskModel.php
  ├── views
  │   ├── errors
  │   │   ├── 404.php
  │   ├── layout
  │   │   ├── header.php
  │   │   └── footer.php
  │   ├── tasks
  │   │   ├── tasksInsertView.php
  │   │   └── TasksListView.php
  │   ├── indexView.php
  │   └── loginView.php
  ├── bd
  │   └── database.sql
- lib
  ├── Database.php
  ├── Helpers.php
  ├── Route.php
  └── SesionManager.php
- public
  ├── img
  ├── css
  ├── .htaccess
  └── index.php
- routes
  └── web.php
```

### 2. **Base de datos**

1. Crear un archivo `database.sql` en la carpeta `/app/db` con la estructura básica para las tablas `tareas` y `usuarios`:

```sql
DROP DATABASE if exists tareas_app;
CREATE DATABASE tareas_app;
USE tareas_app;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_fin TIMESTAMP NULL,
    estado ENUM('pendiente', 'en_progreso', 'completada', 'archivada') DEFAULT 'pendiente',
    usuario VARCHAR(50) NOT NULL,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
);
```

2. Ejecutar el script en el servidor MySQL, y crear un usuario especifico para esta base de datos, con permisos para SELECT, INSERT, UPDATE y DELETE
```sql
CREATE USER 'tareas_app'@'localhost' identified by '1234';
GRANT SELECT, INSERT, UPDATE, DELETE on tareas_app.* to 'tareas_app'@'localhost';
```

4. Añadir tablas adicionales según necesidades futuras, en fases posteriores.

### 3. **Configurar Composer**

1. Instalar Composer si no está instalado: [Descargar Composer](https://getcomposer.org/).
```
sudo apt install curl
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

3. Verificar la versión instalada
```
composer -v
```
   
4. En la raíz del proyecto añadir composer, para ello:
```
composer init
```
Verifica que ha añadido la carpeta vendor y ha creado el archivo composer.json en la raíz del proyecto.

Puedes modificar el arhivo `composer.json`. Debes incluir tu nombre y apellidos en el apartado psr-4 similar a:

```json
{
    "name": "pepelluyot/enrutamiento",
    "description": "Proyecto Tareas, PHP-MVC",
    "type": "project",
    "autoload": {
        "psr-4": {
            "Pepelluyot\\App\\": "app/",
            "Pepelluyot\\Lib\\": "lib/"
        }
    },
    "authors": [
        {
            "name": "Pepe Lluyot",
            "email": "pepe.lluyot@iescristobaldemonroy.es"
        }
    ],
    "require": {}
}
```

5. Ejecutar el comando:
   ```bash
   composer dump-autoload
   ```

4. Subir los cambios:
   ```bash
   git add .
   git commit -m "Configuración inicial del proyecto y estructura de Composer"
   git push origin fase-1
   ```

5. Crear un **Pull Request (PR)** para fusionar `fase-1` en `main`.

---

## **Fase 2: Enrutamiento y punto de acceso único**

Objetivo: Implementar un sistema de enrutamiento y centralizar el acceso a través de `index.php`.

**Crear una rama para esta fase**:
   ```bash
   git checkout -b fase-2
   ```

### 1. **Configurar `.htaccess`**

Crear el archivo `.htaccess` en la carpeta `/public`:

```apache
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
```

### 2. **Crear un enrutador**

1. Crear la clase `Route` en `/lib/Route.php`:

```php
class Route
{
    private static $routes = [];

    //crea un método estático para añadir rutas al array diferenciando si la ruta es mediante el método POST o GET
    // public static function addRoute (...

    // crea un método estático para almacenar la ruta y su función callable mediante el método GET
    // crea un método estático para almacenar la ruta y su función callable mediante el método POST
    
    //crea una función estática para manejar las rutas   
    
}
```

2. Actualizar `public/index.php` para probar el enrutador y comprobar que funciona correctamente:

```php
<?php
//incluimos el autoload para no usar includes/require
require_once "../vendor/autoload.php";
use Pepelluyot\Lib\Route;

Route::get("/",function(){
    echo "<h1>Página de Inicio</h1>";
});
//añadimos diferentes rutas para testear el enrutador

//gestionamos las rutas
Route::handleRoute();
```
3. Implementar el autoload en la página de index.php`.
   
4. Liberar de código la página index.php incluyendo todo el manejo de las rutas en el archivo /router/web.php
   
5. Subir los cambios y crear un **Pull Request para `fase-2`**.

---

## **Fase 3: Vistas**

Objetivo: Crear vistas para el login, página principal y otras necesarias.

**Crear una rama para esta fase**:
   ```bash
   git checkout -b fase-3
   ```

1. **Ubicación de las vistas**:  Las vistas de la aplicación las alojaremos en el directorio `/app/views` con la estructura detallada anteriormente.
   
2. **Creación de las vistas**: Crear las vistas básicas para `loginView.php` y `indexView.php`. Incluir las vistas de la cabecera `header.php` y pie de página `footer.php` que deberán incluirse en el resto de vistas.
   
- La página de login, contendrá un formulario de acceso (usuario y password) que permitirá a un usuario autenticarse en la base de datos y poder acceder a la aplicación.
- La página index, incluirá la cabecera y el pié de página, además de una descripción de la aplicación.
- Desde header.php, se mostrará un menú que se podrá acceder a las distintas partes de la aplicación, además del nombre del usuario autenticado y un botón para cerrar la sesión.
- El archivo footer.php contendrá las credenciales del alumno (nombre y apellidos). 

5. **Subir los cambios**: Subir los cambios y crear un Pull Request para `fase-3`.
---

## **Fase 4: Gestión de la base de datos. Controlador y modelo del Login**

Objetivo: Implementar el acceso a la base de datos y ejecutar sentencias.

**Crear una rama para esta fase**:
   ```bash
   git checkout -b fase-4
   ```
### 1. **Gestión de la base de datos**

1. Crear el archivo `/app/lib/Database.php`.

2. Crea una clase **Database** con las siguientes características:
   - Se debe emplear MySQLi para la gestión de los datos.
   - El método constructor debe devolver la conexión con la base de datos
   - Establecer métodos para realizar la conexión, cerrar la conexión.
   - Crea diferentes métodos públicos para ejecutar sentencias SQL, pasándole un array de parámetros.  Utiliza sentencias preparadas para evitar inyecciones SQL.
     
3. Elabora diferentes pruebas sobre la base de datos, para comprobar que todo funciona correctamente.

### 2. **Controlador de Login**

1. Crear el archivo `/app/controllers/LoginController.php`.
2. Crea una clase **LoginController** con las siguientes características:
   - Emplea métodos ***estáticos***
   - Crea diferentes métodos que deberán ser llamados por el enrutador cuando se acceda al login.
   - Valida los campos del formulario
   - Llama al modelo **LoginModel** para comprobar las credenciales del usuario (en la base de datos).
   - Llamar a la vista **LoginView** para mostrar el formulario de login.
   - Redirigir a la página principal cuando el usuario se autentifique.

### 3. **Modelo de Login**
1. Crear el modelo **LoginModel** en `/app/models/LoginModel.php`
   - Emplea en el la clase **Database** para establecer y cerrar la conexión con la base de datos .
   - Crea diferentes métodos para comprobar la autentificación de un usuario (usuario y password) sobre la tabla `usuarios` (haciendo uso de los métodos de la clase Database)
   - El password de cada usuario estará encriptado en la base de datos, usa el método password_verify para verificar la autentificación del usuario.
   - Realiza pruebas usando la clase LoginModel para verificar la autentificación de un usuario.

### 2. **Flujo de trabajo de Login**
1. El flujo de la **pantalla de login** será de la siguiente manera:
   - Cuando se accede a login, el enrutador llamará al controlador LoginController y este mostrará la vista LoginView que contiene el formulario de autentificación
   - Cuando el usuario rellena el formulario, el enrutador llama de nuevo al controlador LoginController. Este realizará las validaciones pertinentes y llamará al modelo LoginModel para comprobar las credenciales del usuario. Si todo ha ido correcto, se redirigirá a la página principal, si algo ha ido mal se mostrará de nuevo la vista LoginView con el mensaje de error.
     
### 2. **Subir los cambios**
1. **Subir los cambios**: Subir los cambios y crear un Pull Request para `fase-4`.
---

## **Fase 5: Gestión de Sesiones. Usuario autenticado. Gestión de la página principal.**

Objetivo: Implementar la lógica de autenticación y sesiones.

### 1. **Crear la clase SesionManager**
   - Crear el archivo `/lib/SessionManager.php`.
   - Incluir métodos estáticos para gestionar la sesión de usuario. Añadir variables de sesión, obtener sus valores, comprobar si el usuario está autenticado, etc...

### 2. **Crear un controlador y una vista para la página principal**
   - Crear un controlador ***HomeController*** en /app/controller para gestionar la página principal y el resto de páginas genéricas (como página de contacto, página de error 404, etc..), 
   - Crea una vista ***indexView*** en /app/views para mostrar la página principal

### 3. **Implementar en los controladores la verificación del usuario autenticado**
   - Implementar la autenticación del usuario en todas las páginas, haciendo uso de la clase SesionManager:
     - Si el usuario se ha autenticado correctamente desde la página de login, se deberá almacenar en sesión el nombre de usuario
     - En todas las páginas se verificará que existe esa variable de sesión, en otro caso se redirigirá a la pantalla de login
     - De la misma forma si accedemos a la página de login y ya existe un usuario autenticado nos redirigiremos a la página principal.
     - Implementar en las vistas un mensaje de bienvenida al usuario autenticado, y un botón que permita hacer un logout del usuario (y destruir la sesión).

---

## **Fase 6: Gestión de Tareas (por desarrollar)**

Objetivo: Crear un nuevo controlador, modelo y vistas para gestionar las tareas.

1. Crear el archivo `/app/controllers/TaskController.php`.
2. Crear el modelo `/app/models/TaskModel.php`.
3. Crear vistas específicas en `/app/views/tasks/`.

---

## **Fases Futuras**

Las siguientes fases se definirán en base a las necesidades del proyecto y al progreso del equipo.

---

## **Flujo de Trabajo**

1. Trabaja siempre en una rama específica para cada fase (por ejemplo, `fase-1`).
2. Envía tus cambios mediante un Pull Request para revisión.
3. Solo pasa a la siguiente fase cuando el Pull Request sea aprobado.
