# [BACK-END] - LOCATEL
###CAJERO "Cuenta Ahorro"- BACKEND & FRONTEND
######BACKEND -LARAVEL-SANCTUM API

##馃搫 Descripci贸n

Actualmente el proyecto cuenta con cuatro (4) endpoints del tipo API REST:

####Los Endpoint a crear SON:

>ADMINISTRADORES:
>
```route - POST (Crear Usuarios): /api/register ```

```route - POST (Login): /api/login ```

```route - POST (Info de 1 Usuario): /api/userinfo ```


>CLIENTE:
> 
```route - POST (Crear Nueva Cuenta): /api/create_acount ```

```route - POST (ejecutar opcionies de cuenta): /api/tramitar ```

>API FRONTEND:
>
```route - POST (listar tipos de tramite): /api/get_tipo_tramite  ```

```route - POST (Listar tipos de Cuentas que se pueden crear): /api/get_tipo_cuenta  ```



> **Observaciones del Desarrollador:**
>
> 
>Por favoy no olvide en Configurar el archivo **.ENV** y ejecutar el comando **PHP Artisan Migrate**
>
> Adicionalmente no olvide que por defecto el controllador **app/Http/Controllers/TransactionController Line:57** Tiene el orden en el que deberian estar guardadas las operaciones en la tabla **tipo_tramite**.
> 
## 馃摉 馃搵 Especificaciones:
Su empleador lo ha contratado para renovar su sistema financiero de gesti贸n de cuentas de ahorro. Necesitamos una
soluci贸n que se ajuste a las necesidades de la compa帽铆a, que permita ser competitivo en un mercado en el cual el
tiempo de respuesta, confiabilidad y seguridad de la plataforma pueden decidir si la compa帽铆a contin煤a o no.
###1. Se requiere implementar una Aplicaci贸n separando la l贸gica Front-end del Back-end.
Este proyecto Pertenece a la Logica Back-end y esta desarrollado en el Framework Laravel
###2. Los servicios deben quedar expuestos como servicio web SOAP, REST o ambos.
Este proyecto Maneja REST por medio de SANCTUM - laravel.
###3. Se tiene que implementar la soluci贸n en JAVA-Spring, PHP puro, Framework Laravel, codelneiter o symfony.
Este proyecto esta desarrollado en Laravel.
###4. El caso de usar Java Usar Hibernate o Jpa como ORM.
Este proyecto utiliza el ORM Eloquent inmerso en Laravel.
###5. Se pede usar cualquier motor de base de datos relacional para la persistencia.
Pruebas Realizadas en un Servidor MySQL 5.6
###6. Se debe usar angular o react para el front-end.
El proyecto Front-end esta realizado en angular y puede ser visto en https://github.com/cocoballz/Locatel_cajero_frontend
###7. Se puede usar cualquier servidor de aplicaciones.
Se realizan las pruebas en entornos locales con:
* Xampp 
* Laragon
###8. Debe compartir el repositorio mediante gitlab, github o bickbucket.
 Puede Acceder al repositorio desde https://github.com/cocoballz/Locatel_cajero_frontend
o en el perfil https://github.com/cocoballz

## 馃摉 馃搵 Observaciones:

Se debe sustentar el desarrollo de manera verbal en la entrevista t茅cnica.
Tenga en cuenta que est谩 en un proceso de selecci贸n y que detalles adicionales, pero opcionales, que se pueden
presentar tales como:
* Estilos.
* Usabilidad.
* Documentaci贸n
* Validaciones.
* Logging.
* Testing.
* Seguridad.

Tendr谩n una alta valoraci贸n por parte del evaluador, sin embargo, estos detalles no lo deben distraer del objetivo que
es alcanzar los requisitos exigidos.

### Copyright
Creado por Sebastian Carvajal OCT 2021 - Laravel [API]
