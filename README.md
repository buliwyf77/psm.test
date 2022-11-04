<h1>Prueba de Laravel para PSM</h1>

<strong>Para probar la aplicacion, siga los siguientes pasos:</strong>


<ol>
<li>Clonar Repo https://github.com/buliwyf77/psm.test.git</li>

<li>Crear una base de datos en mySQL con los siguientes datos:<br>
DB_DATABASE=psm.test<br>
DB_USERNAME=psm.test<br>
DB_PASSWORD=psm.test<br>
</li>


<li>dentro de la carpeta psm.test ejecutar los siguientes comandos en el mismo orden</li>

<li>composer install</li>

<li>npm install</li>

<li>npm run development (dos veces, para estar seguro)</li>

<li>php artisan migrate</li>

<li>php artisan serve</li>

<li>entrar en http://127.0.0.1:8000 y registrarse</li>

</ol>

<p>
se deben crear primero las marcas de telefonos, luego los modelos y al final puede incrementar o disminuir el inventario. si el inventario baja a menos de 3, el sistema emitira una alerta en forma de aumentar la fuente de la cantidad de inventario y le cambia el color a rojo
</p>

<p>
Cualquier duda puede contactarme en <a href=mailto:luis@luistorrealba.com>luis@luistorrealba.com</a>
</p>