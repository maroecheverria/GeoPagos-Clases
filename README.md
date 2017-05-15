EJERCICIO DE CLASES
==================

Se poseen las siguientes tablas: <br />
**USUARIOS** (codigousuario, usuario, clave, edad) <br />
**FAVORITOS** (codigousuario, codigousuariofavorito) <br />
**USUARIOSPAGOS** (codigopago, codigousuario) <br />
**PAGOS** (codigopago, importe, fecha)

Aclaración: la tabla "favoritos" une usuarios con otros usuarios a través de los campos codigousuario
y codigousuariofavorito.

Cree las clases que le parezca conveniente tener, en relación a las tablas expuestas, para poder
administrar (altas, bajas y modificaciones) los usuarios, sus favoritos, y sus pagos, teniendo en
cuenta lo siguiente:<br />
a) Los usuarios no pueden tener un nombre de usuario vacío (campo “usuario” de la tabla
Usuarios), y la edad debe ser mayor a 18. <br />
b) No deben poder crearse registros muertos (codigousuario inexistente en la tabla Usuarios)
en la tabla Favoritos, teniendo en cuenta el control de sus dos campos. <br />
c) Ídem para la tabla UsuariosPagos <br />
d) El importe de los Pagos debe ser mayor a cero, y la fecha no puede ser anterior al dia de
hoy. <br />

Las clases deben contar con todas las validaciones mencionadas, de manera que un
programador que no tenga acceso a la documentación igualmente pueda instanciar y utilizar los
objetos de estas clases correctamente
No es necesario escribir las consultas SQL para guardar en base de datos

**Framework: Symfony Standard Edition 3.2**

To run the Symfony application please follow these steps:

 * ```-git clone https://github.com/maroecheverria/GeoPagos-Clases.git```
 
 * ```composer install```
 
 * browse to the project directory and execute this command ```$ php bin/console server:run```
 
 * open your browser and access [http://localhost:8000/shapes](http://localhost:8000/clases)
 
 **Enjoy!**



