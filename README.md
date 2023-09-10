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

   - Este fragmento de código no se proporcionó en la pregunta original, pero se puede implementar de manera similar a "agregar.php" para eliminar usuarios de la base de datos.

Estos códigos son parte de un sistema de gestión de usuarios que permite agregar y listar usuarios. Utilizan una base de datos PostgreSQL para almacenar y recuperar los datos de los usuarios. Además, realizan validaciones para garantizar la integridad de los datos ingresados por el usuario.

