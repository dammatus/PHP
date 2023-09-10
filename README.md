# PHP
---

### Resumen del Funcionamiento

Estos fragmentos de código PHP están diseñados para un sistema de administración de usuarios. Fue realizado durante el Curso Programación III en la Universidad Nacional de San Luis.
A continuación, se presenta un resumen de cómo funcionan:

1. **Agregar Usuarios (`agregar.php`):**

   - El código valida y procesa los datos ingresados por el usuario en un formulario HTML.
   - Realiza comprobaciones de validación en campos como nombre, apellido, correo electrónico, etc.
   - Conecta con una base de datos PostgreSQL para verificar si un nombre de usuario (nickname) ya existe.
   - Si no hay errores de validación y el usuario no existe, inserta los datos del usuario en la base de datos.
   - Informa al usuario sobre el éxito o los errores del proceso mediante mensajes en la página.

2. **Listar Usuarios (`listar.php`):**

   - Se conecta a la base de datos PostgreSQL.
   - Realiza una consulta SQL para recuperar los datos de usuarios almacenados en la tabla "usuario," ordenándolos por apellido.
   - Presenta los datos de los usuarios en una tabla HTML en la página.
   - Utiliza un bucle PHP para recorrer los resultados de la consulta y mostrar cada usuario en una fila de la tabla.

3. **Homepage (`index.php`):**

   - Presenta una página de inicio básica que muestra un menú de navegación con enlaces a diferentes funciones del sistema.
   - Un elemento del menú está resaltado para indicar la página actual.

4. **Eliminación de Usuarios (`borrar.php`):**

   - La página se encarga de mostrar una interfaz para eliminar usuarios y listar los usuarios existentes.
   - Establece una conexión a una base de datos PostgreSQL utilizando los datos de conexión proporcionados.
   - Permite eliminar usuarios existentes:
      * Cuando se envía el formulario para borrar un usuario, se ejecuta una consulta SQL que elimina el usuario con el nombre de usuario (nickname) especificado.
      * Luego, muestra un mensaje indicando si el usuario se eliminó correctamente o si hubo un error.
   - Lista los usuarios existentes en una tabla HTML:
      * Recupera los datos de los usuarios almacenados en la base de datos.
      * Utiliza un bucle PHP para mostrar cada usuario en una fila de la tabla, incluyendo detalles como apellido, nombre, nick, correo electrónico, dirección, género y teléfono.
      * Junto a cada usuario, proporciona un botón "Borrar" que permite eliminar ese usuario específico.
   - Cierra la conexión a la base de datos después de realizar todas las operaciones necesarias.

Estos códigos son parte de un sistema de gestión de usuarios que permite agregar y listar usuarios. Utilizan una base de datos PostgreSQL para almacenar y recuperar los datos de los usuarios. Además, realizan validaciones para garantizar la integridad de los datos ingresados por el usuario.

