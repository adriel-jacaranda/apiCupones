<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.5.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.5.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
            <img src="img/logo.png" alt="logo" class="logo" style="padding-top: 10px;" width="100%"/>
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-autenticacion-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="autenticacion-adm">
                    <a href="#autenticacion-adm">Autenticación ADM</a>
                </li>
                                    <ul id="tocify-subheader-autenticacion-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="autenticacion-adm-POSTapi-register">
                                <a href="#autenticacion-adm-POSTapi-register">Registrar un nuevo usuario

Crea un nuevo usuario en el sistema y devuelve un token de autenticación.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-POSTapi-login">
                                <a href="#autenticacion-adm-POSTapi-login">Iniciar sesión

Verifica las credenciales del usuario y devuelve un token de acceso Bearer.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-GETapi-me">
                                <a href="#autenticacion-adm-GETapi-me">Obtener información del usuario autenticado

Devuelve los datos del usuario autenticado junto con sus relaciones `tipoCliente` y `almacen`.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-GETapi-usuarios">
                                <a href="#autenticacion-adm-GETapi-usuarios">Listar todos los usuarios

Devuelve una lista de todos los usuarios registrados con sus relaciones.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-DELETEapi-usuarios--id-">
                                <a href="#autenticacion-adm-DELETEapi-usuarios--id-">Eliminar un usuario

Elimina un usuario existente por su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-PUTapi-usuarios--id-">
                                <a href="#autenticacion-adm-PUTapi-usuarios--id-">Actualizar un usuario existente

Permite modificar los datos de un usuario (nombre, correo, rol, contraseña, etc.).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-POSTapi-logout">
                                <a href="#autenticacion-adm-POSTapi-logout">Cerrar sesión

Elimina el token de acceso actual del usuario autenticado.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="autenticacion-adm-POSTapi-refresh-token">
                                <a href="#autenticacion-adm-POSTapi-refresh-token">Refrescar token de autenticación

Revoca el token actual y genera uno nuevo.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-campanas-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="campanas-adm">
                    <a href="#campanas-adm">Campañas ADM</a>
                </li>
                                    <ul id="tocify-subheader-campanas-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="campanas-adm-GETapi-campaniasComer">
                                <a href="#campanas-adm-GETapi-campaniasComer">Listar todas las campañas (modo completo)

Retorna todas las campañas con sus cupones, sin filtrar por estado.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-GETapi-campanias">
                                <a href="#campanas-adm-GETapi-campanias">Listar todas las campañas

Retorna todas las campañas registradas con sus relaciones.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-POSTapi-campanias">
                                <a href="#campanas-adm-POSTapi-campanias">Crear una nueva campaña

Crea una campaña y genera automáticamente sus cupones asociados.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-GETapi-campanias--id-">
                                <a href="#campanas-adm-GETapi-campanias--id-">Mostrar una campaña

Obtiene los datos de una campaña específica.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-POSTapi-campanias--id-">
                                <a href="#campanas-adm-POSTapi-campanias--id-">Actualizar una campaña

Modifica los datos de una campaña existente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-DELETEapi-campanias--id-">
                                <a href="#campanas-adm-DELETEapi-campanias--id-">Eliminar una campaña

Elimina una campaña junto con sus cupones y relaciones.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-GETapi-campanias-tipo-cliente--id_tipo_cliente-">
                                <a href="#campanas-adm-GETapi-campanias-tipo-cliente--id_tipo_cliente-">Listar campañas por tipo de cliente

Obtiene todas las campañas activas asociadas a un tipo de cliente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-POSTapi-campanias--campania--almacenes">
                                <a href="#campanas-adm-POSTapi-campanias--campania--almacenes">Asociar almacenes a una campaña</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="campanas-adm-GETapi-campanias-almacenes--id--campanias">
                                <a href="#campanas-adm-GETapi-campanias-almacenes--id--campanias">Obtener campañas por almacén

Muestra todas las campañas asociadas a un almacén.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-creacion-de-categorias-de-comercio-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="creacion-de-categorias-de-comercio-adm">
                    <a href="#creacion-de-categorias-de-comercio-adm">Creación de Categorías de Comercio ADM</a>
                </li>
                                    <ul id="tocify-subheader-creacion-de-categorias-de-comercio-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="creacion-de-categorias-de-comercio-adm-GETapi-loadServices">
                                <a href="#creacion-de-categorias-de-comercio-adm-GETapi-loadServices">Listar todas las categorías

Devuelve una lista de todas las categorías registradas.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-categorias-de-comercio-adm-GETapi-categoria-almacen">
                                <a href="#creacion-de-categorias-de-comercio-adm-GETapi-categoria-almacen">Listar todas las categorías

Devuelve una lista de todas las categorías registradas.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-categorias-de-comercio-adm-POSTapi-categoria-almacen">
                                <a href="#creacion-de-categorias-de-comercio-adm-POSTapi-categoria-almacen">Crear una nueva categoría

Permite registrar una nueva categoría de comercio.
Requiere autenticación con token **Bearer**.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-categorias-de-comercio-adm-GETapi-categoria-almacen--id-">
                                <a href="#creacion-de-categorias-de-comercio-adm-GETapi-categoria-almacen--id-">Mostrar una categoría específica

Obtiene la información de una categoría por su ID.
Requiere autenticación con token **Bearer**.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-categorias-de-comercio-adm-POSTapi-categoria-almacen--id-">
                                <a href="#creacion-de-categorias-de-comercio-adm-POSTapi-categoria-almacen--id-">Actualizar una categoría

Permite modificar los datos de una categoría existente.
Requiere autenticación con token **Bearer**.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-categorias-de-comercio-adm-DELETEapi-categoria-almacen--id-">
                                <a href="#creacion-de-categorias-de-comercio-adm-DELETEapi-categoria-almacen--id-">Eliminar una categoría

Elimina una categoría por su ID.
Requiere autenticación con token **Bearer**.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-creacion-de-comercios-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="creacion-de-comercios-adm">
                    <a href="#creacion-de-comercios-adm">Creación de Comercios ADM</a>
                </li>
                                    <ul id="tocify-subheader-creacion-de-comercios-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-GETapi-comercio-categoria--categoriaId-">
                                <a href="#creacion-de-comercios-adm-GETapi-comercio-categoria--categoriaId-">Obtener comercios por categoría

Devuelve una lista de comercios filtrados por su categoría.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-GETapi-comercio-web">
                                <a href="#creacion-de-comercios-adm-GETapi-comercio-web">Obtener todos los comercios (Web)

Similar al método anterior, pensado para vista web o administración.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-GETapi-almacenes">
                                <a href="#creacion-de-comercios-adm-GETapi-almacenes">Obtener todos los comercios

Devuelve una lista de todos los comercios registrados.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-POSTapi-almacenes">
                                <a href="#creacion-de-comercios-adm-POSTapi-almacenes">Crear un nuevo comercio

Crea un nuevo registro de comercio.  
Soporta subida de imagen (`logo`) y requiere autenticación.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-GETapi-almacenes--id-">
                                <a href="#creacion-de-comercios-adm-GETapi-almacenes--id-">Mostrar un comercio específico

Obtiene los datos de un comercio a partir de su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-POSTapi-almacenes--id-">
                                <a href="#creacion-de-comercios-adm-POSTapi-almacenes--id-">Actualizar un comercio existente

Permite modificar los datos de un comercio.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="creacion-de-comercios-adm-DELETEapi-almacenes--id-">
                                <a href="#creacion-de-comercios-adm-DELETEapi-almacenes--id-">Eliminar un comercio

Elimina el comercio indicado por ID y su imagen asociada (si existe).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-cupones-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="cupones-adm">
                    <a href="#cupones-adm">Cupones ADM</a>
                </li>
                                    <ul id="tocify-subheader-cupones-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="cupones-adm-GETapi-cupones-codigo--codigo-">
                                <a href="#cupones-adm-GETapi-cupones-codigo--codigo-">Buscar cupón por código y traer campaña + almacenes</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-GETapi-cuponesComer">
                                <a href="#cupones-adm-GETapi-cuponesComer">Listado extendido con información de usuarios que reclamaron</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-GETapi-cupones">
                                <a href="#cupones-adm-GETapi-cupones">Listar todos los cupones</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-GETapi-cupones-campania--campania_id-">
                                <a href="#cupones-adm-GETapi-cupones-campania--campania_id-">Obtener cupones por campaña</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-POSTapi-cupones">
                                <a href="#cupones-adm-POSTapi-cupones">Crear un nuevo cupón manual</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-GETapi-cupones--id-">
                                <a href="#cupones-adm-GETapi-cupones--id-">Mostrar un cupón por ID</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-PUTapi-cupones--id-">
                                <a href="#cupones-adm-PUTapi-cupones--id-">Actualizar un cupón</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-adm-DELETEapi-cupones--id-">
                                <a href="#cupones-adm-DELETEapi-cupones--id-">Eliminar un cupón</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-cupones-redimidos" class="tocify-header">
                <li class="tocify-item level-1" data-unique="cupones-redimidos">
                    <a href="#cupones-redimidos">Cupones Redimidos</a>
                </li>
                                    <ul id="tocify-subheader-cupones-redimidos" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="cupones-redimidos-GETapi-cupones-redimidos">
                                <a href="#cupones-redimidos-GETapi-cupones-redimidos">Listar todos los cupones redimidos</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-redimidos-GETapi-cupones-redimidos--id-">
                                <a href="#cupones-redimidos-GETapi-cupones-redimidos--id-">Mostrar un cupón redimido específico</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-redimidos-PUTapi-cupones-redimidos--id-">
                                <a href="#cupones-redimidos-PUTapi-cupones-redimidos--id-">Actualizar un cupón redimido</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="cupones-redimidos-DELETEapi-cupones-redimidos--id-">
                                <a href="#cupones-redimidos-DELETEapi-cupones-redimidos--id-">Eliminar un cupón redimido</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-test">
                                <a href="#endpoints-GETapi-test">GET api/test</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-gestion-de-asignaciones-de-cupones-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="gestion-de-asignaciones-de-cupones-adm">
                    <a href="#gestion-de-asignaciones-de-cupones-adm">Gestión de Asignaciones de Cupones ADM</a>
                </li>
                                    <ul id="tocify-subheader-gestion-de-asignaciones-de-cupones-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-POSTapi-cupones-reclamados">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-POSTapi-cupones-reclamados">Cupones reclamados por usuario (rango de fechas)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-GETapi-cupones-cupones-usuario--id-">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-GETapi-cupones-cupones-usuario--id-">Cupones por usuario</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-GETapi-asignaciones">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-GETapi-asignaciones">Listar todas las asignaciones</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-POSTapi-asignaciones-cupon">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-POSTapi-asignaciones-cupon">Crear asignación mediante DNI + código</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-GETapi-asignaciones--id-">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-GETapi-asignaciones--id-">Mostrar asignación por ID</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-DELETEapi-asignaciones--id-">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-DELETEapi-asignaciones--id-">Eliminar asignación</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="gestion-de-asignaciones-de-cupones-adm-POSTapi-asignaciones-filtrar">
                                <a href="#gestion-de-asignaciones-de-cupones-adm-POSTapi-asignaciones-filtrar">Cupones por campaña y almacén</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-tipos-de-cliente-adm" class="tocify-header">
                <li class="tocify-item level-1" data-unique="tipos-de-cliente-adm">
                    <a href="#tipos-de-cliente-adm">Tipos de Cliente ADM</a>
                </li>
                                    <ul id="tocify-subheader-tipos-de-cliente-adm" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="tipos-de-cliente-adm-GETapi-tipo-cliente">
                                <a href="#tipos-de-cliente-adm-GETapi-tipo-cliente">Listar tipos de cliente

Retorna todos los tipos de cliente registrados.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-cliente-adm-POSTapi-tipo-cliente">
                                <a href="#tipos-de-cliente-adm-POSTapi-tipo-cliente">Crear un tipo de cliente

Crea un nuevo tipo de cliente en el sistema.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-cliente-adm-GETapi-tipo-cliente--id-">
                                <a href="#tipos-de-cliente-adm-GETapi-tipo-cliente--id-">Mostrar un tipo de cliente

Obtiene los datos de un tipo de cliente por su ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-cliente-adm-PUTapi-tipo-cliente--id-">
                                <a href="#tipos-de-cliente-adm-PUTapi-tipo-cliente--id-">Actualizar un tipo de cliente

Actualiza los datos de un tipo de cliente existente.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="tipos-de-cliente-adm-DELETEapi-tipo-cliente--id-">
                                <a href="#tipos-de-cliente-adm-DELETEapi-tipo-cliente--id-">Eliminar un tipo de cliente

Elimina un tipo de cliente por su ID.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-z-flujo-de-redimicion-de-clientes" class="tocify-header">
                <li class="tocify-item level-1" data-unique="z-flujo-de-redimicion-de-clientes">
                    <a href="#z-flujo-de-redimicion-de-clientes">Z Flujo de Redimición de Clientes</a>
                </li>
                                    <ul id="tocify-subheader-z-flujo-de-redimicion-de-clientes" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="z-flujo-de-redimicion-de-clientes-GETapi-comercio--id--campanias">
                                <a href="#z-flujo-de-redimicion-de-clientes-GETapi-comercio--id--campanias">Obtener campañas de un almacén

Retorna el almacén junto con sus campañas y cupones asociados.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="z-flujo-de-redimicion-de-clientes-GETapi-cupones-redimidos-user--userId-">
                                <a href="#z-flujo-de-redimicion-de-clientes-GETapi-cupones-redimidos-user--userId-">Obtener cupones redimidos por usuario</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="z-flujo-de-redimicion-de-clientes-POSTapi-cupones-redimidos">
                                <a href="#z-flujo-de-redimicion-de-clientes-POSTapi-cupones-redimidos">Registrar un nuevo cupón redimido</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="z-flujo-de-redimicion-de-clientes-POSTapi-asignaciones">
                                <a href="#z-flujo-de-redimicion-de-clientes-POSTapi-asignaciones">Crear una nueva asignación (canje de cupón)</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Última actualización: 30/10/2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Documentación interactiva de la API con autenticación mediante Bearer Token.</p>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>Bienvenido a la documentación de nuestra API 🚀  
Aquí puedes probar directamente los endpoints usando el botón **"Try It Out"**  
Si algún endpoint requiere autenticación, introduce tu **Bearer Token** en la parte superior.</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Introduce tu token de autenticación en formato: <b>tu_token_aquí</b>.</p>

        <h1 id="autenticacion-adm">Autenticación ADM</h1>

    

                                <h2 id="autenticacion-adm-POSTapi-register">Registrar un nuevo usuario

Crea un nuevo usuario en el sistema y devuelve un token de autenticación.</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Juan\",
    \"nombre_completo\": \"Juan Pérez\",
    \"celular\": \"77712345\",
    \"direccion\": \"Av. Pando 123\",
    \"email\": \"juan@correo.com\",
    \"password\": \"123456\",
    \"password_confirmation\": \"123456\",
    \"rol\": \"cliente\",
    \"id_tipo_cliente\": 2,
    \"id_almacen\": 5
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Juan",
    "nombre_completo": "Juan Pérez",
    "celular": "77712345",
    "direccion": "Av. Pando 123",
    "email": "juan@correo.com",
    "password": "123456",
    "password_confirmation": "123456",
    "rol": "cliente",
    "id_tipo_cliente": 2,
    "id_almacen": 5
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/register';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'name' =&gt; 'Juan',
            'nombre_completo' =&gt; 'Juan Pérez',
            'celular' =&gt; '77712345',
            'direccion' =&gt; 'Av. Pando 123',
            'email' =&gt; 'juan@correo.com',
            'password' =&gt; '123456',
            'password_confirmation' =&gt; '123456',
            'rol' =&gt; 'cliente',
            'id_tipo_cliente' =&gt; 2,
            'id_almacen' =&gt; 5,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;access_token&quot;: &quot;1|xxxxxxx&quot;,
    &quot;token_type&quot;: &quot;Bearer&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Juan&quot;,
        &quot;email&quot;: &quot;juan@correo.com&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="Juan"
               data-component="body">
    <br>
<p>Nombre del usuario. Example: <code>Juan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre_completo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre_completo"                data-endpoint="POSTapi-register"
               value="Juan Pérez"
               data-component="body">
    <br>
<p>Nombre completo del usuario. Example: <code>Juan Pérez</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>celular</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="celular"                data-endpoint="POSTapi-register"
               value="77712345"
               data-component="body">
    <br>
<p>Número de celular del usuario. Example: <code>77712345</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>direccion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direccion"                data-endpoint="POSTapi-register"
               value="Av. Pando 123"
               data-component="body">
    <br>
<p>Dirección del usuario. Example: <code>Av. Pando 123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="juan@correo.com"
               data-component="body">
    <br>
<p>Correo electrónico. Example: <code>juan@correo.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="123456"
               data-component="body">
    <br>
<p>Contraseña del usuario. Example: <code>123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-register"
               value="123456"
               data-component="body">
    <br>
<p>Confirmación de la contraseña. Example: <code>123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rol</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="rol"                data-endpoint="POSTapi-register"
               value="cliente"
               data-component="body">
    <br>
<p>Rol del usuario (admin, cliente, gestionador, almacen). Example: <code>cliente</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_tipo_cliente</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_tipo_cliente"                data-endpoint="POSTapi-register"
               value="2"
               data-component="body">
    <br>
<p>ID del tipo de cliente. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_almacen</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_almacen"                data-endpoint="POSTapi-register"
               value="5"
               data-component="body">
    <br>
<p>ID del almacén asociado. Example: <code>5</code></p>
        </div>
        </form>

                    <h2 id="autenticacion-adm-POSTapi-login">Iniciar sesión

Verifica las credenciales del usuario y devuelve un token de acceso Bearer.</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"juan@correo.com\",
    \"password\": \"123456\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "juan@correo.com",
    "password": "123456"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/login';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'juan@correo.com',
            'password' =&gt; '123456',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;access_token&quot;: &quot;1|xxxxxxx&quot;,
    &quot;token_type&quot;: &quot;Bearer&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Juan&quot;,
        &quot;email&quot;: &quot;juan@correo.com&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="juan@correo.com"
               data-component="body">
    <br>
<p>Correo electrónico del usuario. Example: <code>juan@correo.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="123456"
               data-component="body">
    <br>
<p>Contraseña del usuario. Example: <code>123456</code></p>
        </div>
        </form>

                    <h2 id="autenticacion-adm-GETapi-me">Obtener información del usuario autenticado

Devuelve los datos del usuario autenticado junto con sus relaciones `tipoCliente` y `almacen`.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/me" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/me';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-me" data-method="GET"
      data-path="api/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-me"
                    onclick="tryItOut('GETapi-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-me"
                    onclick="cancelTryOut('GETapi-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-me"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="autenticacion-adm-GETapi-usuarios">Listar todos los usuarios

Devuelve una lista de todos los usuarios registrados con sus relaciones.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-usuarios">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/usuarios" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/usuarios"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/usuarios';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-usuarios">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-usuarios" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-usuarios"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-usuarios"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-usuarios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-usuarios">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-usuarios" data-method="GET"
      data-path="api/usuarios"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-usuarios', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-usuarios"
                    onclick="tryItOut('GETapi-usuarios');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-usuarios"
                    onclick="cancelTryOut('GETapi-usuarios');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-usuarios"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/usuarios</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-usuarios"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-usuarios"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="autenticacion-adm-DELETEapi-usuarios--id-">Eliminar un usuario

Elimina un usuario existente por su ID.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-usuarios--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/usuarios/1" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/usuarios/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/usuarios/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-usuarios--id-">
</span>
<span id="execution-results-DELETEapi-usuarios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-usuarios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-usuarios--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-usuarios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-usuarios--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-usuarios--id-" data-method="DELETE"
      data-path="api/usuarios/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-usuarios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-usuarios--id-"
                    onclick="tryItOut('DELETEapi-usuarios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-usuarios--id-"
                    onclick="cancelTryOut('DELETEapi-usuarios--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-usuarios--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/usuarios/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-usuarios--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-usuarios--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del usuario a eliminar. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="autenticacion-adm-PUTapi-usuarios--id-">Actualizar un usuario existente

Permite modificar los datos de un usuario (nombre, correo, rol, contraseña, etc.).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-usuarios--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/usuarios/1" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/usuarios/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/usuarios/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-usuarios--id-">
</span>
<span id="execution-results-PUTapi-usuarios--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-usuarios--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-usuarios--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-usuarios--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-usuarios--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-usuarios--id-" data-method="PUT"
      data-path="api/usuarios/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-usuarios--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-usuarios--id-"
                    onclick="tryItOut('PUTapi-usuarios--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-usuarios--id-"
                    onclick="cancelTryOut('PUTapi-usuarios--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-usuarios--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/usuarios/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-usuarios--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-usuarios--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-usuarios--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del usuario a actualizar. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="autenticacion-adm-POSTapi-logout">Cerrar sesión

Elimina el token de acceso actual del usuario autenticado.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/logout" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/logout';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Sesi&oacute;n cerrada&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="autenticacion-adm-POSTapi-refresh-token">Refrescar token de autenticación

Revoca el token actual y genera uno nuevo.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-refresh-token">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/refresh-token" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/refresh-token"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/refresh-token';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-refresh-token">
</span>
<span id="execution-results-POSTapi-refresh-token" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-refresh-token"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-refresh-token"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-refresh-token" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-refresh-token">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-refresh-token" data-method="POST"
      data-path="api/refresh-token"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-refresh-token', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-refresh-token"
                    onclick="tryItOut('POSTapi-refresh-token');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-refresh-token"
                    onclick="cancelTryOut('POSTapi-refresh-token');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-refresh-token"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/refresh-token</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-refresh-token"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-refresh-token"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-refresh-token"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="campanas-adm">Campañas ADM</h1>

    

                                <h2 id="campanas-adm-GETapi-campaniasComer">Listar todas las campañas (modo completo)

Retorna todas las campañas con sus cupones, sin filtrar por estado.</h2>

<p>
</p>



<span id="example-requests-GETapi-campaniasComer">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campaniasComer" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campaniasComer"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campaniasComer';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-campaniasComer">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">array&lt;Campania&gt;</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campaniasComer" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campaniasComer"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campaniasComer"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campaniasComer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campaniasComer">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campaniasComer" data-method="GET"
      data-path="api/campaniasComer"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campaniasComer', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campaniasComer"
                    onclick="tryItOut('GETapi-campaniasComer');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campaniasComer"
                    onclick="cancelTryOut('GETapi-campaniasComer');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campaniasComer"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campaniasComer</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campaniasComer"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campaniasComer"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="campanas-adm-GETapi-campanias">Listar todas las campañas

Retorna todas las campañas registradas con sus relaciones.</h2>

<p>
</p>



<span id="example-requests-GETapi-campanias">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campanias" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-campanias">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Campa&ntilde;a D&iacute;a de la Madre&quot;,
        &quot;descripcion&quot;: &quot;Descuentos especiales por el d&iacute;a de la madre&quot;,
        &quot;descuento_porcentaje&quot;: 20,
        &quot;cantidad_maxima&quot;: 100,
        &quot;activo&quot;: true,
        &quot;tipo_cliente&quot;: {
            &quot;id&quot;: 1,
            &quot;nombre&quot;: &quot;Cliente Premium&quot;
        },
        &quot;almacenes&quot;: [],
        &quot;cupones&quot;: []
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campanias" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campanias"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campanias"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campanias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campanias">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campanias" data-method="GET"
      data-path="api/campanias"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campanias', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campanias"
                    onclick="tryItOut('GETapi-campanias');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campanias"
                    onclick="cancelTryOut('GETapi-campanias');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campanias"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campanias</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="campanas-adm-POSTapi-campanias">Crear una nueva campaña

Crea una campaña y genera automáticamente sus cupones asociados.</h2>

<p>
</p>



<span id="example-requests-POSTapi-campanias">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/campanias" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "nombre=Campaña Día del Padre"\
    --form "descripcion=Descuentos especiales en artículos de regalo"\
    --form "descuento_porcentaje=15"\
    --form "compra_minima=50"\
    --form "compra_maxima=500"\
    --form "fecha_caducidad=2025-12-31"\
    --form "cantidad_maxima=100"\
    --form "id_tipo_cliente=1"\
    --form "activo=1"\
    --form "almacenes[]=1"\
    --form "banner=@C:\Users\ibers\AppData\Local\Temp\php7A5.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nombre', 'Campaña Día del Padre');
body.append('descripcion', 'Descuentos especiales en artículos de regalo');
body.append('descuento_porcentaje', '15');
body.append('compra_minima', '50');
body.append('compra_maxima', '500');
body.append('fecha_caducidad', '2025-12-31');
body.append('cantidad_maxima', '100');
body.append('id_tipo_cliente', '1');
body.append('activo', '1');
body.append('almacenes[]', '1');
body.append('banner', document.querySelector('input[name="banner"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nombre',
                'contents' =&gt; 'Campaña Día del Padre'
            ],
            [
                'name' =&gt; 'descripcion',
                'contents' =&gt; 'Descuentos especiales en artículos de regalo'
            ],
            [
                'name' =&gt; 'descuento_porcentaje',
                'contents' =&gt; '15'
            ],
            [
                'name' =&gt; 'compra_minima',
                'contents' =&gt; '50'
            ],
            [
                'name' =&gt; 'compra_maxima',
                'contents' =&gt; '500'
            ],
            [
                'name' =&gt; 'fecha_caducidad',
                'contents' =&gt; '2025-12-31'
            ],
            [
                'name' =&gt; 'cantidad_maxima',
                'contents' =&gt; '100'
            ],
            [
                'name' =&gt; 'id_tipo_cliente',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'activo',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'almacenes[]',
                'contents' =&gt; '1'
            ],
            [
                'name' =&gt; 'banner',
                'contents' =&gt; fopen('C:\Users\ibers\AppData\Local\Temp\php7A5.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-campanias">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 10,
    &quot;nombre&quot;: &quot;Campa&ntilde;a D&iacute;a del Padre&quot;,
    &quot;descripcion&quot;: &quot;Descuentos especiales en art&iacute;culos de regalo&quot;,
    &quot;banner&quot;: &quot;storage/banner_campanias/padre.jpg&quot;,
    &quot;almacenes&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;errors&quot;: {
        &quot;nombre&quot;: [
            &quot;El campo nombre es obligatorio.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-campanias" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-campanias"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-campanias"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-campanias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-campanias">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-campanias" data-method="POST"
      data-path="api/campanias"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-campanias', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-campanias"
                    onclick="tryItOut('POSTapi-campanias');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-campanias"
                    onclick="cancelTryOut('POSTapi-campanias');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-campanias"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/campanias</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-campanias"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-campanias"
               value="Campaña Día del Padre"
               data-component="body">
    <br>
<p>Nombre de la campaña. Example: <code>Campaña Día del Padre</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="POSTapi-campanias"
               value="Descuentos especiales en artículos de regalo"
               data-component="body">
    <br>
<p>Descripción de la campaña. Example: <code>Descuentos especiales en artículos de regalo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descuento_porcentaje</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="descuento_porcentaje"                data-endpoint="POSTapi-campanias"
               value="15"
               data-component="body">
    <br>
<p>Porcentaje de descuento. Example: <code>15</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>compra_minima</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="compra_minima"                data-endpoint="POSTapi-campanias"
               value="50"
               data-component="body">
    <br>
<p>Monto mínimo de compra. Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>compra_maxima</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="compra_maxima"                data-endpoint="POSTapi-campanias"
               value="500"
               data-component="body">
    <br>
<p>Monto máximo de compra. Example: <code>500</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_caducidad</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_caducidad"                data-endpoint="POSTapi-campanias"
               value="2025-12-31"
               data-component="body">
    <br>
<p>Fecha de caducidad de los cupones. Example: <code>2025-12-31</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cantidad_maxima</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cantidad_maxima"                data-endpoint="POSTapi-campanias"
               value="100"
               data-component="body">
    <br>
<p>Cantidad total de cupones a generar. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_tipo_cliente</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_tipo_cliente"                data-endpoint="POSTapi-campanias"
               value="1"
               data-component="body">
    <br>
<p>ID del tipo de cliente. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activo</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-campanias" style="display: none">
            <input type="radio" name="activo"
                   value="true"
                   data-endpoint="POSTapi-campanias"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-campanias" style="display: none">
            <input type="radio" name="activo"
                   value="false"
                   data-endpoint="POSTapi-campanias"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indica si la campaña está activa. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>almacenes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="almacenes[0]"                data-endpoint="POSTapi-campanias"
               data-component="body">
        <input type="text" style="display: none"
               name="almacenes[1]"                data-endpoint="POSTapi-campanias"
               data-component="body">
    <br>
<p>IDs de almacenes asociados.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="banner"                data-endpoint="POSTapi-campanias"
               value=""
               data-component="body">
    <br>
<p>Imagen de banner de la campaña. Example: <code>C:\Users\ibers\AppData\Local\Temp\php7A5.tmp</code></p>
        </div>
        </form>

                    <h2 id="campanas-adm-GETapi-campanias--id-">Mostrar una campaña

Obtiene los datos de una campaña específica.</h2>

<p>
</p>



<span id="example-requests-GETapi-campanias--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campanias/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-campanias--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Campa&ntilde;a de Verano&quot;,
    &quot;descripcion&quot;: &quot;Descuentos en productos seleccionados&quot;,
    &quot;tipo_cliente&quot;: {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Cliente Regular&quot;
    },
    &quot;cupones&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Campa&ntilde;a no encontrada&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campanias--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campanias--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campanias--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campanias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campanias--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campanias--id-" data-method="GET"
      data-path="api/campanias/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campanias--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campanias--id-"
                    onclick="tryItOut('GETapi-campanias--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campanias--id-"
                    onclick="cancelTryOut('GETapi-campanias--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campanias--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campanias/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campanias--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campanias--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-campanias--id-"
               value="1"
               data-component="url">
    <br>
<p>ID de la campaña. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="campanas-adm-POSTapi-campanias--id-">Actualizar una campaña

Modifica los datos de una campaña existente.</h2>

<p>
</p>



<span id="example-requests-POSTapi-campanias--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/campanias/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "nombre=Campaña de Navidad"\
    --form "descripcion=Ofertas navideñas"\
    --form "fecha_caducidad=2025-12-31"\
    --form "banner=@C:\Users\ibers\AppData\Local\Temp\php7A6.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('nombre', 'Campaña de Navidad');
body.append('descripcion', 'Ofertas navideñas');
body.append('fecha_caducidad', '2025-12-31');
body.append('banner', document.querySelector('input[name="banner"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias/1';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'multipart/form-data',
            'Accept' =&gt; 'application/json',
        ],
        'multipart' =&gt; [
            [
                'name' =&gt; 'nombre',
                'contents' =&gt; 'Campaña de Navidad'
            ],
            [
                'name' =&gt; 'descripcion',
                'contents' =&gt; 'Ofertas navideñas'
            ],
            [
                'name' =&gt; 'fecha_caducidad',
                'contents' =&gt; '2025-12-31'
            ],
            [
                'name' =&gt; 'banner',
                'contents' =&gt; fopen('C:\Users\ibers\AppData\Local\Temp\php7A6.tmp', 'r')
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-campanias--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Campa&ntilde;a de Navidad&quot;,
    &quot;descripcion&quot;: &quot;Ofertas navide&ntilde;as&quot;,
    &quot;almacenes&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Campa&ntilde;a no encontrada&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-campanias--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-campanias--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-campanias--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-campanias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-campanias--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-campanias--id-" data-method="POST"
      data-path="api/campanias/{id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-campanias--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-campanias--id-"
                    onclick="tryItOut('POSTapi-campanias--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-campanias--id-"
                    onclick="cancelTryOut('POSTapi-campanias--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-campanias--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/campanias/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-campanias--id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-campanias--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-campanias--id-"
               value="1"
               data-component="url">
    <br>
<p>ID de la campaña. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-campanias--id-"
               value="Campaña de Navidad"
               data-component="body">
    <br>
<p>Nuevo nombre de la campaña. Example: <code>Campaña de Navidad</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="POSTapi-campanias--id-"
               value="Ofertas navideñas"
               data-component="body">
    <br>
<p>Descripción de la campaña. Example: <code>Ofertas navideñas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_caducidad</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_caducidad"                data-endpoint="POSTapi-campanias--id-"
               value="2025-12-31"
               data-component="body">
    <br>
<p>Nueva fecha de caducidad. Example: <code>2025-12-31</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>banner</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="banner"                data-endpoint="POSTapi-campanias--id-"
               value=""
               data-component="body">
    <br>
<p>Nuevo banner de la campaña. Example: <code>C:\Users\ibers\AppData\Local\Temp\php7A6.tmp</code></p>
        </div>
        </form>

                    <h2 id="campanas-adm-DELETEapi-campanias--id-">Eliminar una campaña

Elimina una campaña junto con sus cupones y relaciones.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-campanias--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/campanias/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias/3';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-campanias--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Campa&ntilde;a, cupones y almacenes asociados eliminados correctamente&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Campa&ntilde;a no encontrada&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-campanias--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-campanias--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-campanias--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-campanias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-campanias--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-campanias--id-" data-method="DELETE"
      data-path="api/campanias/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-campanias--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-campanias--id-"
                    onclick="tryItOut('DELETEapi-campanias--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-campanias--id-"
                    onclick="cancelTryOut('DELETEapi-campanias--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-campanias--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/campanias/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-campanias--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-campanias--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-campanias--id-"
               value="3"
               data-component="url">
    <br>
<p>ID de la campaña. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="campanas-adm-GETapi-campanias-tipo-cliente--id_tipo_cliente-">Listar campañas por tipo de cliente

Obtiene todas las campañas activas asociadas a un tipo de cliente.</h2>

<p>
</p>



<span id="example-requests-GETapi-campanias-tipo-cliente--id_tipo_cliente-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campanias/tipo-cliente/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias/tipo-cliente/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias/tipo-cliente/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-campanias-tipo-cliente--id_tipo_cliente-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">array&lt;Campania&gt;</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No se encontraron campa&ntilde;as para este tipo de cliente&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campanias-tipo-cliente--id_tipo_cliente-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campanias-tipo-cliente--id_tipo_cliente-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campanias-tipo-cliente--id_tipo_cliente-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campanias-tipo-cliente--id_tipo_cliente-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campanias-tipo-cliente--id_tipo_cliente-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campanias-tipo-cliente--id_tipo_cliente-" data-method="GET"
      data-path="api/campanias/tipo-cliente/{id_tipo_cliente}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campanias-tipo-cliente--id_tipo_cliente-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campanias-tipo-cliente--id_tipo_cliente-"
                    onclick="tryItOut('GETapi-campanias-tipo-cliente--id_tipo_cliente-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campanias-tipo-cliente--id_tipo_cliente-"
                    onclick="cancelTryOut('GETapi-campanias-tipo-cliente--id_tipo_cliente-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campanias-tipo-cliente--id_tipo_cliente-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campanias/tipo-cliente/{id_tipo_cliente}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campanias-tipo-cliente--id_tipo_cliente-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campanias-tipo-cliente--id_tipo_cliente-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id_tipo_cliente</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_tipo_cliente"                data-endpoint="GETapi-campanias-tipo-cliente--id_tipo_cliente-"
               value="1"
               data-component="url">
    <br>
<p>ID del tipo de cliente. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="campanas-adm-POSTapi-campanias--campania--almacenes">Asociar almacenes a una campaña</h2>

<p>
</p>



<span id="example-requests-POSTapi-campanias--campania--almacenes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/campanias/consequatur/almacenes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"almacenes\": [
        2,
        3
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias/consequatur/almacenes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "almacenes": [
        2,
        3
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias/consequatur/almacenes';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'almacenes' =&gt; [
                2,
                3,
            ],
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-campanias--campania--almacenes">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Almacenes asociados correctamente a la campa&ntilde;a&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-campanias--campania--almacenes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-campanias--campania--almacenes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-campanias--campania--almacenes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-campanias--campania--almacenes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-campanias--campania--almacenes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-campanias--campania--almacenes" data-method="POST"
      data-path="api/campanias/{campania}/almacenes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-campanias--campania--almacenes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-campanias--campania--almacenes"
                    onclick="tryItOut('POSTapi-campanias--campania--almacenes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-campanias--campania--almacenes"
                    onclick="cancelTryOut('POSTapi-campanias--campania--almacenes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-campanias--campania--almacenes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/campanias/{campania}/almacenes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-campanias--campania--almacenes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-campanias--campania--almacenes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>campania</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="campania"                data-endpoint="POSTapi-campanias--campania--almacenes"
               value="consequatur"
               data-component="url">
    <br>
<p>The campania. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>campaniaId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campaniaId"                data-endpoint="POSTapi-campanias--campania--almacenes"
               value="1"
               data-component="url">
    <br>
<p>ID de la campaña. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>almacenes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="almacenes[0]"                data-endpoint="POSTapi-campanias--campania--almacenes"
               data-component="body">
        <input type="text" style="display: none"
               name="almacenes[1]"                data-endpoint="POSTapi-campanias--campania--almacenes"
               data-component="body">
    <br>
<p>IDs de almacenes.</p>
        </div>
        </form>

                    <h2 id="campanas-adm-GETapi-campanias-almacenes--id--campanias">Obtener campañas por almacén

Muestra todas las campañas asociadas a un almacén.</h2>

<p>
</p>



<span id="example-requests-GETapi-campanias-almacenes--id--campanias">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/campanias/almacenes/consequatur/campanias" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/campanias/almacenes/consequatur/campanias"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/campanias/almacenes/consequatur/campanias';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-campanias-almacenes--id--campanias">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;campanias&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-campanias-almacenes--id--campanias" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-campanias-almacenes--id--campanias"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-campanias-almacenes--id--campanias"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-campanias-almacenes--id--campanias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-campanias-almacenes--id--campanias">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-campanias-almacenes--id--campanias" data-method="GET"
      data-path="api/campanias/almacenes/{id}/campanias"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-campanias-almacenes--id--campanias', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-campanias-almacenes--id--campanias"
                    onclick="tryItOut('GETapi-campanias-almacenes--id--campanias');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-campanias-almacenes--id--campanias"
                    onclick="cancelTryOut('GETapi-campanias-almacenes--id--campanias');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-campanias-almacenes--id--campanias"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/campanias/almacenes/{id}/campanias</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-campanias-almacenes--id--campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-campanias-almacenes--id--campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-campanias-almacenes--id--campanias"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the almacene. Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>almacenId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="almacenId"                data-endpoint="GETapi-campanias-almacenes--id--campanias"
               value="5"
               data-component="url">
    <br>
<p>ID del almacén. Example: <code>5</code></p>
            </div>
                    </form>

                <h1 id="creacion-de-categorias-de-comercio-adm">Creación de Categorías de Comercio ADM</h1>

    

                                <h2 id="creacion-de-categorias-de-comercio-adm-GETapi-loadServices">Listar todas las categorías

Devuelve una lista de todas las categorías registradas.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-loadServices">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/loadServices" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/loadServices"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/loadServices';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-loadServices">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Bebidas&quot;,
        &quot;descripcion&quot;: &quot;Categor&iacute;a de bebidas fr&iacute;as y calientes&quot;,
        &quot;icono&quot;: &quot;categoria_iconos/bebidas.png&quot;,
        &quot;activo&quot;: true
    }
]</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al obtener categor&iacute;as&quot;,
    &quot;error&quot;: &quot;Detalles del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-loadServices" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-loadServices"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-loadServices"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-loadServices" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-loadServices">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-loadServices" data-method="GET"
      data-path="api/loadServices"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-loadServices', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-loadServices"
                    onclick="tryItOut('GETapi-loadServices');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-loadServices"
                    onclick="cancelTryOut('GETapi-loadServices');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-loadServices"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/loadServices</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-loadServices"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-loadServices"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-loadServices"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="creacion-de-categorias-de-comercio-adm-GETapi-categoria-almacen">Listar todas las categorías

Devuelve una lista de todas las categorías registradas.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-categoria-almacen">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/categoria-almacen" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categoria-almacen"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/categoria-almacen';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-categoria-almacen">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Bebidas&quot;,
        &quot;descripcion&quot;: &quot;Categor&iacute;a de bebidas fr&iacute;as y calientes&quot;,
        &quot;icono&quot;: &quot;categoria_iconos/bebidas.png&quot;,
        &quot;activo&quot;: true
    }
]</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al obtener categor&iacute;as&quot;,
    &quot;error&quot;: &quot;Detalles del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categoria-almacen" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categoria-almacen"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categoria-almacen"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categoria-almacen" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categoria-almacen">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categoria-almacen" data-method="GET"
      data-path="api/categoria-almacen"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categoria-almacen', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categoria-almacen"
                    onclick="tryItOut('GETapi-categoria-almacen');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categoria-almacen"
                    onclick="cancelTryOut('GETapi-categoria-almacen');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categoria-almacen"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categoria-almacen</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-categoria-almacen"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categoria-almacen"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categoria-almacen"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="creacion-de-categorias-de-comercio-adm-POSTapi-categoria-almacen">Crear una nueva categoría

Permite registrar una nueva categoría de comercio.
Requiere autenticación con token **Bearer**.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-categoria-almacen">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/categoria-almacen" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"Bebidas\",
    \"descripcion\": \"Categoría de bebidas frías y calientes\",
    \"activo\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categoria-almacen"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "Bebidas",
    "descripcion": "Categoría de bebidas frías y calientes",
    "activo": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/categoria-almacen';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'nombre' =&gt; 'Bebidas',
            'descripcion' =&gt; 'Categoría de bebidas frías y calientes',
            'activo' =&gt; true,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-categoria-almacen">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Bebidas&quot;,
    &quot;descripcion&quot;: &quot;Categor&iacute;a de bebidas fr&iacute;as y calientes&quot;,
    &quot;icono&quot;: &quot;categoria_iconos/bebidas.png&quot;,
    &quot;activo&quot;: true
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;errors&quot;: {
        &quot;nombre&quot;: [
            &quot;El campo nombre es obligatorio.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al crear categor&iacute;a&quot;,
    &quot;error&quot;: &quot;Detalles del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-categoria-almacen" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-categoria-almacen"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categoria-almacen"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-categoria-almacen" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categoria-almacen">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-categoria-almacen" data-method="POST"
      data-path="api/categoria-almacen"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categoria-almacen', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-categoria-almacen"
                    onclick="tryItOut('POSTapi-categoria-almacen');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-categoria-almacen"
                    onclick="cancelTryOut('POSTapi-categoria-almacen');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-categoria-almacen"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categoria-almacen</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-categoria-almacen"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-categoria-almacen"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-categoria-almacen"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-categoria-almacen"
               value="Bebidas"
               data-component="body">
    <br>
<p>Nombre de la categoría. Example: <code>Bebidas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="POSTapi-categoria-almacen"
               value="Categoría de bebidas frías y calientes"
               data-component="body">
    <br>
<p>Descripción breve. Example: <code>Categoría de bebidas frías y calientes</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activo</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-categoria-almacen" style="display: none">
            <input type="radio" name="activo"
                   value="true"
                   data-endpoint="POSTapi-categoria-almacen"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-categoria-almacen" style="display: none">
            <input type="radio" name="activo"
                   value="false"
                   data-endpoint="POSTapi-categoria-almacen"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Indica si la categoría está activa. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="creacion-de-categorias-de-comercio-adm-GETapi-categoria-almacen--id-">Mostrar una categoría específica

Obtiene la información de una categoría por su ID.
Requiere autenticación con token **Bearer**.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-categoria-almacen--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/categoria-almacen/1" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categoria-almacen/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/categoria-almacen/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-categoria-almacen--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Bebidas&quot;,
    &quot;descripcion&quot;: &quot;Categor&iacute;a de bebidas fr&iacute;as y calientes&quot;,
    &quot;icono&quot;: &quot;categoria_iconos/bebidas.png&quot;,
    &quot;activo&quot;: true
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Categor&iacute;a no encontrada&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al obtener categor&iacute;a&quot;,
    &quot;error&quot;: &quot;Detalles del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categoria-almacen--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categoria-almacen--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categoria-almacen--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categoria-almacen--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categoria-almacen--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categoria-almacen--id-" data-method="GET"
      data-path="api/categoria-almacen/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categoria-almacen--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categoria-almacen--id-"
                    onclick="tryItOut('GETapi-categoria-almacen--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categoria-almacen--id-"
                    onclick="cancelTryOut('GETapi-categoria-almacen--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categoria-almacen--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categoria-almacen/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-categoria-almacen--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categoria-almacen--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categoria-almacen--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-categoria-almacen--id-"
               value="1"
               data-component="url">
    <br>
<p>ID de la categoría. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="creacion-de-categorias-de-comercio-adm-POSTapi-categoria-almacen--id-">Actualizar una categoría

Permite modificar los datos de una categoría existente.
Requiere autenticación con token **Bearer**.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-categoria-almacen--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/categoria-almacen/1" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"Alimentos\",
    \"descripcion\": \"Comidas preparadas y snacks\",
    \"activo\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categoria-almacen/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "Alimentos",
    "descripcion": "Comidas preparadas y snacks",
    "activo": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/categoria-almacen/1';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'nombre' =&gt; 'Alimentos',
            'descripcion' =&gt; 'Comidas preparadas y snacks',
            'activo' =&gt; true,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-categoria-almacen--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Alimentos&quot;,
    &quot;descripcion&quot;: &quot;Comidas preparadas y snacks&quot;,
    &quot;icono&quot;: &quot;categoria_iconos/alimentos.png&quot;,
    &quot;activo&quot;: true
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Categor&iacute;a no encontrada&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al actualizar categor&iacute;a&quot;,
    &quot;error&quot;: &quot;Detalles del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-categoria-almacen--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-categoria-almacen--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categoria-almacen--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-categoria-almacen--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categoria-almacen--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-categoria-almacen--id-" data-method="POST"
      data-path="api/categoria-almacen/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-categoria-almacen--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-categoria-almacen--id-"
                    onclick="tryItOut('POSTapi-categoria-almacen--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-categoria-almacen--id-"
                    onclick="cancelTryOut('POSTapi-categoria-almacen--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-categoria-almacen--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/categoria-almacen/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-categoria-almacen--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-categoria-almacen--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-categoria-almacen--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-categoria-almacen--id-"
               value="1"
               data-component="url">
    <br>
<p>ID de la categoría. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-categoria-almacen--id-"
               value="Alimentos"
               data-component="body">
    <br>
<p>Nombre de la categoría. Example: <code>Alimentos</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="POSTapi-categoria-almacen--id-"
               value="Comidas preparadas y snacks"
               data-component="body">
    <br>
<p>Descripción de la categoría. Example: <code>Comidas preparadas y snacks</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activo</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-categoria-almacen--id-" style="display: none">
            <input type="radio" name="activo"
                   value="true"
                   data-endpoint="POSTapi-categoria-almacen--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-categoria-almacen--id-" style="display: none">
            <input type="radio" name="activo"
                   value="false"
                   data-endpoint="POSTapi-categoria-almacen--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Estado de la categoría. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="creacion-de-categorias-de-comercio-adm-DELETEapi-categoria-almacen--id-">Eliminar una categoría

Elimina una categoría por su ID.
Requiere autenticación con token **Bearer**.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-categoria-almacen--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/categoria-almacen/1" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categoria-almacen/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/categoria-almacen/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-categoria-almacen--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Categor&iacute;a eliminada correctamente&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Categor&iacute;a no encontrada&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al eliminar categor&iacute;a&quot;,
    &quot;error&quot;: &quot;Detalles del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-categoria-almacen--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-categoria-almacen--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categoria-almacen--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-categoria-almacen--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categoria-almacen--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-categoria-almacen--id-" data-method="DELETE"
      data-path="api/categoria-almacen/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categoria-almacen--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-categoria-almacen--id-"
                    onclick="tryItOut('DELETEapi-categoria-almacen--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-categoria-almacen--id-"
                    onclick="cancelTryOut('DELETEapi-categoria-almacen--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-categoria-almacen--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/categoria-almacen/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-categoria-almacen--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-categoria-almacen--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-categoria-almacen--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-categoria-almacen--id-"
               value="1"
               data-component="url">
    <br>
<p>ID de la categoría. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="creacion-de-comercios-adm">Creación de Comercios ADM</h1>

    

                                <h2 id="creacion-de-comercios-adm-GETapi-comercio-categoria--categoriaId-">Obtener comercios por categoría

Devuelve una lista de comercios filtrados por su categoría.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-comercio-categoria--categoriaId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/comercio/categoria/2" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/comercio/categoria/2"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/comercio/categoria/2';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-comercio-categoria--categoriaId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 3,
        &quot;nombre&quot;: &quot;Selectos&quot;,
        &quot;direccion&quot;: &quot;Mas Articulos al Mejor Precio&quot;,
        &quot;telefono&quot;: &quot;54145415132&quot;,
        &quot;lat&quot;: &quot;-29.5114841&quot;,
        &quot;lng&quot;: &quot;-67.1938264&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/3p3rE8q29pLVcGWe8kUFOB5OftVwjaopPsS3yLF1.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 2,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-24T21:27:48.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:24.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-comercio-categoria--categoriaId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-comercio-categoria--categoriaId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-comercio-categoria--categoriaId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-comercio-categoria--categoriaId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-comercio-categoria--categoriaId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-comercio-categoria--categoriaId-" data-method="GET"
      data-path="api/comercio/categoria/{categoriaId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-comercio-categoria--categoriaId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-comercio-categoria--categoriaId-"
                    onclick="tryItOut('GETapi-comercio-categoria--categoriaId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-comercio-categoria--categoriaId-"
                    onclick="cancelTryOut('GETapi-comercio-categoria--categoriaId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-comercio-categoria--categoriaId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/comercio/categoria/{categoriaId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-comercio-categoria--categoriaId-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-comercio-categoria--categoriaId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-comercio-categoria--categoriaId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>categoriaId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categoriaId"                data-endpoint="GETapi-comercio-categoria--categoriaId-"
               value="2"
               data-component="url">
    <br>
<p>ID de la categoría. Example: <code>2</code></p>
            </div>
                    </form>

                    <h2 id="creacion-de-comercios-adm-GETapi-comercio-web">Obtener todos los comercios (Web)

Similar al método anterior, pensado para vista web o administración.</h2>

<p>
</p>



<span id="example-requests-GETapi-comercio-web">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/comercio-web" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/comercio-web"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/comercio-web';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-comercio-web">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 2,
        &quot;nombre&quot;: &quot;Econo&quot;,
        &quot;direccion&quot;: &quot;Donde Mejor se compra&quot;,
        &quot;telefono&quot;: &quot;54 459465465&quot;,
        &quot;lat&quot;: &quot;-32.9657168&quot;,
        &quot;lng&quot;: &quot;-62.4901330&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/7mDQYnxkEpkeSK5m4LcSdfciHBp1ZafYIqLkizSG.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 1,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-24T19:52:18.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:16.000000Z&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;nombre&quot;: &quot;Selectos&quot;,
        &quot;direccion&quot;: &quot;Mas Articulos al Mejor Precio&quot;,
        &quot;telefono&quot;: &quot;54145415132&quot;,
        &quot;lat&quot;: &quot;-29.5114841&quot;,
        &quot;lng&quot;: &quot;-67.1938264&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/3p3rE8q29pLVcGWe8kUFOB5OftVwjaopPsS3yLF1.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 2,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-24T21:27:48.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:24.000000Z&quot;
    },
    {
        &quot;id&quot;: 4,
        &quot;nombre&quot;: &quot;SuperMax&quot;,
        &quot;direccion&quot;: &quot;M&aacute;s Super&quot;,
        &quot;telefono&quot;: &quot;542121329&quot;,
        &quot;lat&quot;: &quot;-33.5533744&quot;,
        &quot;lng&quot;: &quot;-60.7211625&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/vmwSxTj6Llsi7unpdXlSCfJdJtFe8MCN1EDtOPNo.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 3,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-25T02:10:26.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:32.000000Z&quot;
    },
    {
        &quot;id&quot;: 5,
        &quot;nombre&quot;: &quot;Plaza Lo&iacute;za&quot;,
        &quot;direccion&quot;: &quot;Todo lo que necesitas en  un solo lugar&quot;,
        &quot;telefono&quot;: &quot;5487878785&quot;,
        &quot;lat&quot;: &quot;-31.7030118&quot;,
        &quot;lng&quot;: &quot;-63.1821000&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/ErKn4B4ednpgXSH7wGzh0oygclTdJxF5ZZQ71hAt.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 5,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-25T02:11:12.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:39.000000Z&quot;
    },
    {
        &quot;id&quot;: 6,
        &quot;nombre&quot;: &quot;Pepe Ganga&quot;,
        &quot;direccion&quot;: &quot;El regreso a clases comienza aqui&quot;,
        &quot;telefono&quot;: &quot;5477878755&quot;,
        &quot;lat&quot;: &quot;-26.1288917&quot;,
        &quot;lng&quot;: &quot;-64.8520219&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/ujvgTRAinMfQNluposSHmZWAGHxKJ5hgAQHIgCrQ.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 7,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-25T02:11:50.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:47.000000Z&quot;
    },
    {
        &quot;id&quot;: 7,
        &quot;nombre&quot;: &quot;Pueblo&quot;,
        &quot;direccion&quot;: &quot;Juan Mermoz Sur 2000&quot;,
        &quot;telefono&quot;: &quot;111111&quot;,
        &quot;lat&quot;: &quot;-17.8365746&quot;,
        &quot;lng&quot;: &quot;-63.1525742&quot;,
        &quot;logo&quot;: &quot;http://127.0.0.1:8000/storage/almacenes/z2U8RAazixhbTgEp9QjMEiJWOwJ9FWGJWzhItwms.jpg&quot;,
        &quot;categoria_almacen_id&quot;: 3,
        &quot;activo&quot;: 1,
        &quot;created_at&quot;: &quot;2025-07-30T20:36:18.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-17T17:08:57.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-comercio-web" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-comercio-web"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-comercio-web"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-comercio-web" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-comercio-web">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-comercio-web" data-method="GET"
      data-path="api/comercio-web"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-comercio-web', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-comercio-web"
                    onclick="tryItOut('GETapi-comercio-web');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-comercio-web"
                    onclick="cancelTryOut('GETapi-comercio-web');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-comercio-web"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/comercio-web</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-comercio-web"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-comercio-web"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="creacion-de-comercios-adm-GETapi-almacenes">Obtener todos los comercios

Devuelve una lista de todos los comercios registrados.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-almacenes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/almacenes" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/almacenes"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/almacenes';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-almacenes">
            <blockquote>
            <p>Example response (200, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Supermercado Central&quot;,
        &quot;direccion&quot;: &quot;Av. Busch 123&quot;,
        &quot;telefono&quot;: &quot;78945612&quot;,
        &quot;lat&quot;: -17.781,
        &quot;lng&quot;: -63.182,
        &quot;categoria_almacen_id&quot;: 2,
        &quot;activo&quot;: true,
        &quot;logo&quot;: &quot;almacenes/logo1.png&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-almacenes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-almacenes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-almacenes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-almacenes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-almacenes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-almacenes" data-method="GET"
      data-path="api/almacenes"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-almacenes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-almacenes"
                    onclick="tryItOut('GETapi-almacenes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-almacenes"
                    onclick="cancelTryOut('GETapi-almacenes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-almacenes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/almacenes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-almacenes"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-almacenes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-almacenes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="creacion-de-comercios-adm-POSTapi-almacenes">Crear un nuevo comercio

Crea un nuevo registro de comercio.  
Soporta subida de imagen (`logo`) y requiere autenticación.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-almacenes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/almacenes" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"\\\"MiniMarket Sol\\\"\",
    \"direccion\": \"\\\"Av. Pando #56\\\"\",
    \"telefono\": \"\\\"76543210\\\"\",
    \"lat\": \"-17.394\",
    \"lng\": \"-66.154\",
    \"categoria_almacen_id\": 4,
    \"activo\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/almacenes"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "\"MiniMarket Sol\"",
    "direccion": "\"Av. Pando #56\"",
    "telefono": "\"76543210\"",
    "lat": "-17.394",
    "lng": "-66.154",
    "categoria_almacen_id": 4,
    "activo": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/almacenes';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'nombre' =&gt; '"MiniMarket Sol"',
            'direccion' =&gt; '"Av. Pando #56"',
            'telefono' =&gt; '"76543210"',
            'lat' =&gt; '-17.394',
            'lng' =&gt; '-66.154',
            'categoria_almacen_id' =&gt; 4,
            'activo' =&gt; true,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-almacenes">
            <blockquote>
            <p>Example response (201, Creado):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 12,
    &quot;nombre&quot;: &quot;MiniMarket Sol&quot;,
    &quot;logo&quot;: &quot;almacenes/minimarket_sol.png&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validación fallida):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;errors&quot;: {
        &quot;nombre&quot;: [
            &quot;El campo nombre es obligatorio.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-almacenes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-almacenes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-almacenes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-almacenes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-almacenes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-almacenes" data-method="POST"
      data-path="api/almacenes"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-almacenes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-almacenes"
                    onclick="tryItOut('POSTapi-almacenes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-almacenes"
                    onclick="cancelTryOut('POSTapi-almacenes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-almacenes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/almacenes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-almacenes"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-almacenes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-almacenes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-almacenes"
               value=""MiniMarket Sol""
               data-component="body">
    <br>
<p>Nombre del comercio. Example: <code>"MiniMarket Sol"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>direccion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direccion"                data-endpoint="POSTapi-almacenes"
               value=""Av. Pando #56""
               data-component="body">
    <br>
<p>Dirección del comercio. Example: <code>"Av. Pando #56"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>telefono</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="telefono"                data-endpoint="POSTapi-almacenes"
               value=""76543210""
               data-component="body">
    <br>
<p>Teléfono de contacto. Example: <code>"76543210"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lat</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="lat"                data-endpoint="POSTapi-almacenes"
               value="-17.394"
               data-component="body">
    <br>
<p>Latitud del comercio. Example: <code>-17.394</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lng</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="lng"                data-endpoint="POSTapi-almacenes"
               value="-66.154"
               data-component="body">
    <br>
<p>Longitud del comercio. Example: <code>-66.154</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>categoria_almacen_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="categoria_almacen_id"                data-endpoint="POSTapi-almacenes"
               value="4"
               data-component="body">
    <br>
<p>ID de la categoría. Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activo</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-almacenes" style="display: none">
            <input type="radio" name="activo"
                   value="true"
                   data-endpoint="POSTapi-almacenes"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-almacenes" style="display: none">
            <input type="radio" name="activo"
                   value="false"
                   data-endpoint="POSTapi-almacenes"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Estado del comercio. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="creacion-de-comercios-adm-GETapi-almacenes--id-">Mostrar un comercio específico

Obtiene los datos de un comercio a partir de su ID.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-almacenes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/almacenes/3" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/almacenes/3"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/almacenes/3';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-almacenes--id-">
            <blockquote>
            <p>Example response (200, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 3,
    &quot;nombre&quot;: &quot;Farmacia Salud&quot;,
    &quot;telefono&quot;: &quot;77445566&quot;,
    &quot;activo&quot;: true
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, No encontrado):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Almac&eacute;n no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-almacenes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-almacenes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-almacenes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-almacenes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-almacenes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-almacenes--id-" data-method="GET"
      data-path="api/almacenes/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-almacenes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-almacenes--id-"
                    onclick="tryItOut('GETapi-almacenes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-almacenes--id-"
                    onclick="cancelTryOut('GETapi-almacenes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-almacenes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/almacenes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-almacenes--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-almacenes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-almacenes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-almacenes--id-"
               value="3"
               data-component="url">
    <br>
<p>ID del comercio. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="creacion-de-comercios-adm-POSTapi-almacenes--id-">Actualizar un comercio existente

Permite modificar los datos de un comercio.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-almacenes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/almacenes/10" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"\\\"Super Sol\\\"\",
    \"direccion\": \"\\\"Av. América #123\\\"\",
    \"telefono\": \"\\\"70445566\\\"\",
    \"activo\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/almacenes/10"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "\"Super Sol\"",
    "direccion": "\"Av. América #123\"",
    "telefono": "\"70445566\"",
    "activo": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/almacenes/10';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'nombre' =&gt; '"Super Sol"',
            'direccion' =&gt; '"Av. América #123"',
            'telefono' =&gt; '"70445566"',
            'activo' =&gt; true,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-almacenes--id-">
            <blockquote>
            <p>Example response (200, Actualizado):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 10,
    &quot;nombre&quot;: &quot;Super Sol&quot;,
    &quot;activo&quot;: true
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Almac&eacute;n no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-almacenes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-almacenes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-almacenes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-almacenes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-almacenes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-almacenes--id-" data-method="POST"
      data-path="api/almacenes/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-almacenes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-almacenes--id-"
                    onclick="tryItOut('POSTapi-almacenes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-almacenes--id-"
                    onclick="cancelTryOut('POSTapi-almacenes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-almacenes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/almacenes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-almacenes--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-almacenes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-almacenes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-almacenes--id-"
               value="10"
               data-component="url">
    <br>
<p>ID del comercio. Example: <code>10</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-almacenes--id-"
               value=""Super Sol""
               data-component="body">
    <br>
<p>Nombre del comercio. Example: <code>"Super Sol"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>direccion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="direccion"                data-endpoint="POSTapi-almacenes--id-"
               value=""Av. América #123""
               data-component="body">
    <br>
<p>Dirección. Example: <code>"Av. América #123"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>telefono</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="telefono"                data-endpoint="POSTapi-almacenes--id-"
               value=""70445566""
               data-component="body">
    <br>
<p>Teléfono. Example: <code>"70445566"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activo</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-almacenes--id-" style="display: none">
            <input type="radio" name="activo"
                   value="true"
                   data-endpoint="POSTapi-almacenes--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-almacenes--id-" style="display: none">
            <input type="radio" name="activo"
                   value="false"
                   data-endpoint="POSTapi-almacenes--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Estado. Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="creacion-de-comercios-adm-DELETEapi-almacenes--id-">Eliminar un comercio

Elimina el comercio indicado por ID y su imagen asociada (si existe).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-almacenes--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/almacenes/8" \
    --header "Authorization: Bearer {YOUR_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/almacenes/8"
);

const headers = {
    "Authorization": "Bearer {YOUR_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/almacenes/8';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Authorization' =&gt; 'Bearer {YOUR_TOKEN}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-almacenes--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Almac&eacute;n eliminado correctamente&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Almac&eacute;n no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-almacenes--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-almacenes--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-almacenes--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-almacenes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-almacenes--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-almacenes--id-" data-method="DELETE"
      data-path="api/almacenes/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-almacenes--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-almacenes--id-"
                    onclick="tryItOut('DELETEapi-almacenes--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-almacenes--id-"
                    onclick="cancelTryOut('DELETEapi-almacenes--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-almacenes--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/almacenes/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-almacenes--id-"
               value="Bearer {YOUR_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-almacenes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-almacenes--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-almacenes--id-"
               value="8"
               data-component="url">
    <br>
<p>ID del comercio. Example: <code>8</code></p>
            </div>
                    </form>

                <h1 id="cupones-adm">Cupones ADM</h1>

    

                                <h2 id="cupones-adm-GETapi-cupones-codigo--codigo-">Buscar cupón por código y traer campaña + almacenes</h2>

<p>
</p>



<span id="example-requests-GETapi-cupones-codigo--codigo-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones/codigo/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/codigo/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/codigo/consequatur';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones-codigo--codigo-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones-codigo--codigo-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones-codigo--codigo-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones-codigo--codigo-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones-codigo--codigo-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones-codigo--codigo-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones-codigo--codigo-" data-method="GET"
      data-path="api/cupones/codigo/{codigo}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones-codigo--codigo-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones-codigo--codigo-"
                    onclick="tryItOut('GETapi-cupones-codigo--codigo-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones-codigo--codigo-"
                    onclick="cancelTryOut('GETapi-cupones-codigo--codigo-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones-codigo--codigo-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones/codigo/{codigo}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones-codigo--codigo-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones-codigo--codigo-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>codigo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="codigo"                data-endpoint="GETapi-cupones-codigo--codigo-"
               value="consequatur"
               data-component="url">
    <br>
<p>Código del cupón Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="cupones-adm-GETapi-cuponesComer">Listado extendido con información de usuarios que reclamaron</h2>

<p>
</p>



<span id="example-requests-GETapi-cuponesComer">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cuponesComer" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cuponesComer"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cuponesComer';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cuponesComer">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cuponesComer" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cuponesComer"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cuponesComer"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cuponesComer" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cuponesComer">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cuponesComer" data-method="GET"
      data-path="api/cuponesComer"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cuponesComer', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cuponesComer"
                    onclick="tryItOut('GETapi-cuponesComer');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cuponesComer"
                    onclick="cancelTryOut('GETapi-cuponesComer');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cuponesComer"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cuponesComer</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cuponesComer"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cuponesComer"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="cupones-adm-GETapi-cupones">Listar todos los cupones</h2>

<p>
</p>



<span id="example-requests-GETapi-cupones">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones">
            <blockquote>
            <p>Example response (200, Lista exitosa):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;codigo&quot;: &quot;ABC123&quot;,
        &quot;campania_id&quot;: 2,
        &quot;created_at&quot;: &quot;...&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones" data-method="GET"
      data-path="api/cupones"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones"
                    onclick="tryItOut('GETapi-cupones');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones"
                    onclick="cancelTryOut('GETapi-cupones');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="cupones-adm-GETapi-cupones-campania--campania_id-">Obtener cupones por campaña</h2>

<p>
</p>



<span id="example-requests-GETapi-cupones-campania--campania_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones/campania/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/campania/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/campania/17';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones-campania--campania_id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones-campania--campania_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones-campania--campania_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones-campania--campania_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones-campania--campania_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones-campania--campania_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones-campania--campania_id-" data-method="GET"
      data-path="api/cupones/campania/{campania_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones-campania--campania_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones-campania--campania_id-"
                    onclick="tryItOut('GETapi-cupones-campania--campania_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones-campania--campania_id-"
                    onclick="cancelTryOut('GETapi-cupones-campania--campania_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones-campania--campania_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones/campania/{campania_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones-campania--campania_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones-campania--campania_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>campania_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campania_id"                data-endpoint="GETapi-cupones-campania--campania_id-"
               value="17"
               data-component="url">
    <br>
<p>ID de la campaña Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="cupones-adm-POSTapi-cupones">Crear un nuevo cupón manual</h2>

<p>
</p>



<span id="example-requests-POSTapi-cupones">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/cupones" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"codigo\": \"consequatur\",
    \"campania_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "codigo": "consequatur",
    "campania_id": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'codigo' =&gt; 'consequatur',
            'campania_id' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-cupones">
</span>
<span id="execution-results-POSTapi-cupones" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cupones"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cupones"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cupones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cupones">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cupones" data-method="POST"
      data-path="api/cupones"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cupones', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cupones"
                    onclick="tryItOut('POSTapi-cupones');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cupones"
                    onclick="cancelTryOut('POSTapi-cupones');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cupones"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cupones</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cupones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cupones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>codigo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="codigo"                data-endpoint="POSTapi-cupones"
               value="consequatur"
               data-component="body">
    <br>
<p>Código único del cupón. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>campania_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campania_id"                data-endpoint="POSTapi-cupones"
               value="17"
               data-component="body">
    <br>
<p>ID de la campaña a la que pertenece. Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="cupones-adm-GETapi-cupones--id-">Mostrar un cupón por ID</h2>

<p>
</p>



<span id="example-requests-GETapi-cupones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/17';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones--id-" data-method="GET"
      data-path="api/cupones/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones--id-"
                    onclick="tryItOut('GETapi-cupones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones--id-"
                    onclick="cancelTryOut('GETapi-cupones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-cupones--id-"
               value="17"
               data-component="url">
    <br>
<p>ID del cupón Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="cupones-adm-PUTapi-cupones--id-">Actualizar un cupón</h2>

<p>
</p>



<span id="example-requests-PUTapi-cupones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/cupones/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"codigo\": \"consequatur\",
    \"campania_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "codigo": "consequatur",
    "campania_id": 17
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/17';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'codigo' =&gt; 'consequatur',
            'campania_id' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-cupones--id-">
</span>
<span id="execution-results-PUTapi-cupones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-cupones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-cupones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-cupones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-cupones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-cupones--id-" data-method="PUT"
      data-path="api/cupones/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-cupones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-cupones--id-"
                    onclick="tryItOut('PUTapi-cupones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-cupones--id-"
                    onclick="cancelTryOut('PUTapi-cupones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-cupones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/cupones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-cupones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-cupones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-cupones--id-"
               value="17"
               data-component="url">
    <br>
<p>ID del cupón Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>codigo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="codigo"                data-endpoint="PUTapi-cupones--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Código único del cupón. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>campania_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campania_id"                data-endpoint="PUTapi-cupones--id-"
               value="17"
               data-component="body">
    <br>
<p>ID de la campaña. Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="cupones-adm-DELETEapi-cupones--id-">Eliminar un cupón</h2>

<p>
</p>



<span id="example-requests-DELETEapi-cupones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/cupones/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/17';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-cupones--id-">
</span>
<span id="execution-results-DELETEapi-cupones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-cupones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-cupones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-cupones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-cupones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-cupones--id-" data-method="DELETE"
      data-path="api/cupones/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-cupones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-cupones--id-"
                    onclick="tryItOut('DELETEapi-cupones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-cupones--id-"
                    onclick="cancelTryOut('DELETEapi-cupones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-cupones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/cupones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-cupones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-cupones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-cupones--id-"
               value="17"
               data-component="url">
    <br>
<p>ID del cupón Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="cupones-redimidos">Cupones Redimidos</h1>

    <p>Endpoints para gestionar los cupones redimidos por los usuarios.</p>

                                <h2 id="cupones-redimidos-GETapi-cupones-redimidos">Listar todos los cupones redimidos</h2>

<p>
</p>

<p>Muestra todos los registros de cupones redimidos, junto con el usuario, cupón y comercio asociados.</p>

<span id="example-requests-GETapi-cupones-redimidos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones-redimidos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones-redimidos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones-redimidos';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones-redimidos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Lista de cupones redimidos obtenida correctamente.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;id_usuario&quot;: 5,
            &quot;userId&quot;: &quot;fb_19823&quot;,
            &quot;couponId&quot;: 10,
            &quot;comercioId&quot;: 3,
            &quot;created_at&quot;: &quot;2025-10-25T18:22:14.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones-redimidos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones-redimidos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones-redimidos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones-redimidos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones-redimidos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones-redimidos" data-method="GET"
      data-path="api/cupones-redimidos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones-redimidos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones-redimidos"
                    onclick="tryItOut('GETapi-cupones-redimidos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones-redimidos"
                    onclick="cancelTryOut('GETapi-cupones-redimidos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones-redimidos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones-redimidos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones-redimidos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones-redimidos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="cupones-redimidos-GETapi-cupones-redimidos--id-">Mostrar un cupón redimido específico</h2>

<p>
</p>

<p>Devuelve la información de un cupón redimido por su ID.</p>

<span id="example-requests-GETapi-cupones-redimidos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones-redimidos/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones-redimidos/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones-redimidos/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones-redimidos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;couponId&quot;: 10,
    &quot;comercioId&quot;: 3,
    &quot;created_at&quot;: &quot;2025-10-25T18:22:14.000000Z&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cup&oacute;n redimido no encontrado.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones-redimidos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones-redimidos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones-redimidos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones-redimidos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones-redimidos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones-redimidos--id-" data-method="GET"
      data-path="api/cupones-redimidos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones-redimidos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones-redimidos--id-"
                    onclick="tryItOut('GETapi-cupones-redimidos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones-redimidos--id-"
                    onclick="cancelTryOut('GETapi-cupones-redimidos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones-redimidos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones-redimidos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones-redimidos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones-redimidos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-cupones-redimidos--id-"
               value="1"
               data-component="url">
    <br>
<p>El ID del cupón redimido. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="cupones-redimidos-PUTapi-cupones-redimidos--id-">Actualizar un cupón redimido</h2>

<p>
</p>

<p>Permite modificar los datos de un cupón redimido existente.</p>

<span id="example-requests-PUTapi-cupones-redimidos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/cupones-redimidos/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id_usuario\": 5,
    \"userId\": \"fb_19823\",
    \"couponId\": 10,
    \"comercioId\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones-redimidos/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_usuario": 5,
    "userId": "fb_19823",
    "couponId": 10,
    "comercioId": 3
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones-redimidos/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'id_usuario' =&gt; 5,
            'userId' =&gt; 'fb_19823',
            'couponId' =&gt; 10,
            'comercioId' =&gt; 3,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-cupones-redimidos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cup&oacute;n redimido actualizado correctamente.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;couponId&quot;: 10,
        &quot;userId&quot;: &quot;fb_19823&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-cupones-redimidos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-cupones-redimidos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-cupones-redimidos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-cupones-redimidos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-cupones-redimidos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-cupones-redimidos--id-" data-method="PUT"
      data-path="api/cupones-redimidos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-cupones-redimidos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-cupones-redimidos--id-"
                    onclick="tryItOut('PUTapi-cupones-redimidos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-cupones-redimidos--id-"
                    onclick="cancelTryOut('PUTapi-cupones-redimidos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-cupones-redimidos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/cupones-redimidos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="1"
               data-component="url">
    <br>
<p>El ID del cupón redimido. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_usuario</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_usuario"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="5"
               data-component="body">
    <br>
<p>nullable ID del usuario autenticado (si aplica). Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="userId"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="fb_19823"
               data-component="body">
    <br>
<p>nullable ID del usuario externo (por ejemplo, Firebase). Example: <code>fb_19823</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>couponId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="couponId"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="10"
               data-component="body">
    <br>
<p>nullable ID del cupón asociado. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comercioId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="comercioId"                data-endpoint="PUTapi-cupones-redimidos--id-"
               value="3"
               data-component="body">
    <br>
<p>nullable ID del comercio asociado. Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="cupones-redimidos-DELETEapi-cupones-redimidos--id-">Eliminar un cupón redimido</h2>

<p>
</p>

<p>Elimina un registro de cupón redimido existente.</p>

<span id="example-requests-DELETEapi-cupones-redimidos--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/cupones-redimidos/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones-redimidos/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones-redimidos/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-cupones-redimidos--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cupon redimido eliminado.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cup&oacute;n redimido no encontrado.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-cupones-redimidos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-cupones-redimidos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-cupones-redimidos--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-cupones-redimidos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-cupones-redimidos--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-cupones-redimidos--id-" data-method="DELETE"
      data-path="api/cupones-redimidos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-cupones-redimidos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-cupones-redimidos--id-"
                    onclick="tryItOut('DELETEapi-cupones-redimidos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-cupones-redimidos--id-"
                    onclick="cancelTryOut('DELETEapi-cupones-redimidos--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-cupones-redimidos--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/cupones-redimidos/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-cupones-redimidos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-cupones-redimidos--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-cupones-redimidos--id-"
               value="1"
               data-component="url">
    <br>
<p>El ID del cupón redimido. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-test">GET api/test</h2>

<p>
</p>



<span id="example-requests-GETapi-test">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/test" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/test"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/test';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-test">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">true</code>
 </pre>
    </span>
<span id="execution-results-GETapi-test" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-test"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-test"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-test" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-test">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-test" data-method="GET"
      data-path="api/test"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-test', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-test"
                    onclick="tryItOut('GETapi-test');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-test"
                    onclick="cancelTryOut('GETapi-test');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-test"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/test</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-test"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-test"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="gestion-de-asignaciones-de-cupones-adm">Gestión de Asignaciones de Cupones ADM</h1>

    <p>Endpoints para manejar la asignación, canje y consulta de cupones.</p>

                                <h2 id="gestion-de-asignaciones-de-cupones-adm-POSTapi-cupones-reclamados">Cupones reclamados por usuario (rango de fechas)</h2>

<p>
</p>



<span id="example-requests-POSTapi-cupones-reclamados">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/cupones/reclamados" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 8,
    \"fecha_inicio\": \"2025-10-01\",
    \"fecha_fin\": \"2025-10-31\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/reclamados"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 8,
    "fecha_inicio": "2025-10-01",
    "fecha_fin": "2025-10-31"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/reclamados';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'user_id' =&gt; 8,
            'fecha_inicio' =&gt; '2025-10-01',
            'fecha_fin' =&gt; '2025-10-31',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-cupones-reclamados">
</span>
<span id="execution-results-POSTapi-cupones-reclamados" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cupones-reclamados"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cupones-reclamados"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cupones-reclamados" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cupones-reclamados">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cupones-reclamados" data-method="POST"
      data-path="api/cupones/reclamados"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cupones-reclamados', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cupones-reclamados"
                    onclick="tryItOut('POSTapi-cupones-reclamados');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cupones-reclamados"
                    onclick="cancelTryOut('POSTapi-cupones-reclamados');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cupones-reclamados"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cupones/reclamados</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cupones-reclamados"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cupones-reclamados"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-cupones-reclamados"
               value="8"
               data-component="body">
    <br>
<p>ID del usuario. Example: <code>8</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_inicio</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_inicio"                data-endpoint="POSTapi-cupones-reclamados"
               value="2025-10-01"
               data-component="body">
    <br>
<p>Fecha inicial (YYYY-MM-DD). Example: <code>2025-10-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_fin</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_fin"                data-endpoint="POSTapi-cupones-reclamados"
               value="2025-10-31"
               data-component="body">
    <br>
<p>Fecha final (YYYY-MM-DD). Example: <code>2025-10-31</code></p>
        </div>
        </form>

                    <h2 id="gestion-de-asignaciones-de-cupones-adm-GETapi-cupones-cupones-usuario--id-">Cupones por usuario</h2>

<p>
</p>

<p>Obtiene los cupones asignados a un usuario.</p>

<span id="example-requests-GETapi-cupones-cupones-usuario--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones/cupones-usuario/5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones/cupones-usuario/5"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones/cupones-usuario/5';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones-cupones-usuario--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones-cupones-usuario--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones-cupones-usuario--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones-cupones-usuario--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones-cupones-usuario--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones-cupones-usuario--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones-cupones-usuario--id-" data-method="GET"
      data-path="api/cupones/cupones-usuario/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones-cupones-usuario--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones-cupones-usuario--id-"
                    onclick="tryItOut('GETapi-cupones-cupones-usuario--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones-cupones-usuario--id-"
                    onclick="cancelTryOut('GETapi-cupones-cupones-usuario--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones-cupones-usuario--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones/cupones-usuario/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones-cupones-usuario--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones-cupones-usuario--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-cupones-cupones-usuario--id-"
               value="5"
               data-component="url">
    <br>
<p>ID del usuario. Example: <code>5</code></p>
            </div>
                    </form>

                    <h2 id="gestion-de-asignaciones-de-cupones-adm-GETapi-asignaciones">Listar todas las asignaciones</h2>

<p>
</p>

<p>Obtiene todas las asignaciones de cupones con su información relacionada.</p>

<span id="example-requests-GETapi-asignaciones">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/asignaciones" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/asignaciones"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/asignaciones';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-asignaciones">
            <blockquote>
            <p>Example response (200, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;cupon_id&quot;: 2,
        &quot;user_id&quot;: 5,
        &quot;fecha_canje&quot;: &quot;2025-10-29&quot;,
        &quot;cupon&quot;: {
            &quot;codigo&quot;: &quot;ABC123&quot;
        },
        &quot;user&quot;: {
            &quot;name&quot;: &quot;Juan&quot;
        },
        &quot;almacen&quot;: {
            &quot;nombre&quot;: &quot;Sucursal Central&quot;
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-asignaciones" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-asignaciones"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-asignaciones"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-asignaciones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-asignaciones">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-asignaciones" data-method="GET"
      data-path="api/asignaciones"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-asignaciones', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-asignaciones"
                    onclick="tryItOut('GETapi-asignaciones');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-asignaciones"
                    onclick="cancelTryOut('GETapi-asignaciones');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-asignaciones"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/asignaciones</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-asignaciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-asignaciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="gestion-de-asignaciones-de-cupones-adm-POSTapi-asignaciones-cupon">Crear asignación mediante DNI + código</h2>

<p>
</p>

<p>Permite asignar un cupón usando el código del cupón y el DNI del usuario.</p>

<span id="example-requests-POSTapi-asignaciones-cupon">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/asignaciones/cupon" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"codigo\": \"ABC123\",
    \"dni\": \"7896541\",
    \"almacen_id\": 4,
    \"fecha_canje\": \"2025-10-29\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/asignaciones/cupon"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "codigo": "ABC123",
    "dni": "7896541",
    "almacen_id": 4,
    "fecha_canje": "2025-10-29"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/asignaciones/cupon';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'codigo' =&gt; 'ABC123',
            'dni' =&gt; '7896541',
            'almacen_id' =&gt; 4,
            'fecha_canje' =&gt; '2025-10-29',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-asignaciones-cupon">
            <blockquote>
            <p>Example response (201, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;cupon_id&quot;: 5,
    &quot;user_id&quot;: 12,
    &quot;fecha_canje&quot;: &quot;2025-10-29&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (409, Duplicado):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;El usuario ya canje&oacute; este cup&oacute;n.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-asignaciones-cupon" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-asignaciones-cupon"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-asignaciones-cupon"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-asignaciones-cupon" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-asignaciones-cupon">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-asignaciones-cupon" data-method="POST"
      data-path="api/asignaciones/cupon"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-asignaciones-cupon', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-asignaciones-cupon"
                    onclick="tryItOut('POSTapi-asignaciones-cupon');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-asignaciones-cupon"
                    onclick="cancelTryOut('POSTapi-asignaciones-cupon');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-asignaciones-cupon"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/asignaciones/cupon</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-asignaciones-cupon"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-asignaciones-cupon"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>codigo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="codigo"                data-endpoint="POSTapi-asignaciones-cupon"
               value="ABC123"
               data-component="body">
    <br>
<p>Código del cupón. Example: <code>ABC123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dni</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dni"                data-endpoint="POSTapi-asignaciones-cupon"
               value="7896541"
               data-component="body">
    <br>
<p>DNI del usuario. Example: <code>7896541</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>almacen_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="almacen_id"                data-endpoint="POSTapi-asignaciones-cupon"
               value="4"
               data-component="body">
    <br>
<p>ID del comercio donde se realiza el canje. Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_canje</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_canje"                data-endpoint="POSTapi-asignaciones-cupon"
               value="2025-10-29"
               data-component="body">
    <br>
<p>optional Fecha del canje. Example: <code>2025-10-29</code></p>
        </div>
        </form>

                    <h2 id="gestion-de-asignaciones-de-cupones-adm-GETapi-asignaciones--id-">Mostrar asignación por ID</h2>

<p>
</p>

<p>Obtiene una asignación específica.</p>

<span id="example-requests-GETapi-asignaciones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/asignaciones/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/asignaciones/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/asignaciones/17';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-asignaciones--id-">
            <blockquote>
            <p>Example response (200, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;cupon&quot;: {
        &quot;codigo&quot;: &quot;ABC123&quot;
    },
    &quot;user&quot;: {
        &quot;name&quot;: &quot;Juan&quot;
    },
    &quot;almacen&quot;: {
        &quot;nombre&quot;: &quot;Sucursal Central&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, No encontrado):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Asignaci&oacute;n no encontrada.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-asignaciones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-asignaciones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-asignaciones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-asignaciones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-asignaciones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-asignaciones--id-" data-method="GET"
      data-path="api/asignaciones/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-asignaciones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-asignaciones--id-"
                    onclick="tryItOut('GETapi-asignaciones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-asignaciones--id-"
                    onclick="cancelTryOut('GETapi-asignaciones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-asignaciones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/asignaciones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-asignaciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-asignaciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-asignaciones--id-"
               value="17"
               data-component="url">
    <br>
<p>El ID de la asignación. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="gestion-de-asignaciones-de-cupones-adm-DELETEapi-asignaciones--id-">Eliminar asignación</h2>

<p>
</p>



<span id="example-requests-DELETEapi-asignaciones--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/asignaciones/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/asignaciones/7"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/asignaciones/7';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-asignaciones--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Asignaci&oacute;n eliminada correctamente.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Asignaci&oacute;n no encontrada.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-asignaciones--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-asignaciones--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-asignaciones--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-asignaciones--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-asignaciones--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-asignaciones--id-" data-method="DELETE"
      data-path="api/asignaciones/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-asignaciones--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-asignaciones--id-"
                    onclick="tryItOut('DELETEapi-asignaciones--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-asignaciones--id-"
                    onclick="cancelTryOut('DELETEapi-asignaciones--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-asignaciones--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/asignaciones/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-asignaciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-asignaciones--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-asignaciones--id-"
               value="7"
               data-component="url">
    <br>
<p>ID de la asignación. Example: <code>7</code></p>
            </div>
                    </form>

                    <h2 id="gestion-de-asignaciones-de-cupones-adm-POSTapi-asignaciones-filtrar">Cupones por campaña y almacén</h2>

<p>
</p>



<span id="example-requests-POSTapi-asignaciones-filtrar">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/asignaciones/filtrar" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"campania_id\": 2,
    \"almacen_id\": 4
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/asignaciones/filtrar"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "campania_id": 2,
    "almacen_id": 4
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/asignaciones/filtrar';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'campania_id' =&gt; 2,
            'almacen_id' =&gt; 4,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-asignaciones-filtrar">
</span>
<span id="execution-results-POSTapi-asignaciones-filtrar" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-asignaciones-filtrar"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-asignaciones-filtrar"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-asignaciones-filtrar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-asignaciones-filtrar">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-asignaciones-filtrar" data-method="POST"
      data-path="api/asignaciones/filtrar"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-asignaciones-filtrar', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-asignaciones-filtrar"
                    onclick="tryItOut('POSTapi-asignaciones-filtrar');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-asignaciones-filtrar"
                    onclick="cancelTryOut('POSTapi-asignaciones-filtrar');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-asignaciones-filtrar"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/asignaciones/filtrar</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-asignaciones-filtrar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-asignaciones-filtrar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>campania_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="campania_id"                data-endpoint="POSTapi-asignaciones-filtrar"
               value="2"
               data-component="body">
    <br>
<p>ID de la campaña. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>almacen_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="almacen_id"                data-endpoint="POSTapi-asignaciones-filtrar"
               value="4"
               data-component="body">
    <br>
<p>ID del comercio. Example: <code>4</code></p>
        </div>
        </form>

                <h1 id="tipos-de-cliente-adm">Tipos de Cliente ADM</h1>

    

                                <h2 id="tipos-de-cliente-adm-GETapi-tipo-cliente">Listar tipos de cliente

Retorna todos los tipos de cliente registrados.</h2>

<p>
</p>



<span id="example-requests-GETapi-tipo-cliente">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/tipo-cliente" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/tipo-cliente"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/tipo-cliente';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-tipo-cliente">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Cliente Premium&quot;,
        &quot;descripcion&quot;: &quot;Acceso a promociones especiales&quot;,
        &quot;created_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tipo-cliente" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tipo-cliente"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tipo-cliente"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tipo-cliente" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tipo-cliente">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tipo-cliente" data-method="GET"
      data-path="api/tipo-cliente"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tipo-cliente', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tipo-cliente"
                    onclick="tryItOut('GETapi-tipo-cliente');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tipo-cliente"
                    onclick="cancelTryOut('GETapi-tipo-cliente');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tipo-cliente"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tipo-cliente</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tipo-cliente"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tipo-cliente"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="tipos-de-cliente-adm-POSTapi-tipo-cliente">Crear un tipo de cliente

Crea un nuevo tipo de cliente en el sistema.</h2>

<p>
</p>



<span id="example-requests-POSTapi-tipo-cliente">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/tipo-cliente" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"Cliente Premium\",
    \"descripcion\": \"Acceso a promociones especiales\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/tipo-cliente"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "Cliente Premium",
    "descripcion": "Acceso a promociones especiales"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/tipo-cliente';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'nombre' =&gt; 'Cliente Premium',
            'descripcion' =&gt; 'Acceso a promociones especiales',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-tipo-cliente">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Cliente Premium&quot;,
    &quot;descripcion&quot;: &quot;Acceso a promociones especiales&quot;,
    &quot;created_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error al crear tipo de cliente&quot;,
    &quot;error&quot;: &quot;Mensaje del error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-tipo-cliente" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tipo-cliente"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tipo-cliente"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-tipo-cliente" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tipo-cliente">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-tipo-cliente" data-method="POST"
      data-path="api/tipo-cliente"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tipo-cliente', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tipo-cliente"
                    onclick="tryItOut('POSTapi-tipo-cliente');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tipo-cliente"
                    onclick="cancelTryOut('POSTapi-tipo-cliente');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tipo-cliente"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tipo-cliente</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-tipo-cliente"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-tipo-cliente"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="POSTapi-tipo-cliente"
               value="Cliente Premium"
               data-component="body">
    <br>
<p>Nombre del tipo de cliente. Example: <code>Cliente Premium</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="POSTapi-tipo-cliente"
               value="Acceso a promociones especiales"
               data-component="body">
    <br>
<p>Descripción del tipo de cliente. Example: <code>Acceso a promociones especiales</code></p>
        </div>
        </form>

                    <h2 id="tipos-de-cliente-adm-GETapi-tipo-cliente--id-">Mostrar un tipo de cliente

Obtiene los datos de un tipo de cliente por su ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-tipo-cliente--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/tipo-cliente/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/tipo-cliente/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/tipo-cliente/1';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-tipo-cliente--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Cliente Premium&quot;,
    &quot;descripcion&quot;: &quot;Acceso a promociones especiales&quot;,
    &quot;created_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tipo de cliente no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tipo-cliente--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tipo-cliente--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tipo-cliente--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tipo-cliente--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tipo-cliente--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tipo-cliente--id-" data-method="GET"
      data-path="api/tipo-cliente/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tipo-cliente--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tipo-cliente--id-"
                    onclick="tryItOut('GETapi-tipo-cliente--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tipo-cliente--id-"
                    onclick="cancelTryOut('GETapi-tipo-cliente--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tipo-cliente--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tipo-cliente/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tipo-cliente--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tipo-cliente--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-tipo-cliente--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del tipo de cliente. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="tipos-de-cliente-adm-PUTapi-tipo-cliente--id-">Actualizar un tipo de cliente

Actualiza los datos de un tipo de cliente existente.</h2>

<p>
</p>



<span id="example-requests-PUTapi-tipo-cliente--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/tipo-cliente/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nombre\": \"Cliente Regular\",
    \"descripcion\": \"Acceso a descuentos estándar\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/tipo-cliente/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "Cliente Regular",
    "descripcion": "Acceso a descuentos estándar"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/tipo-cliente/1';
$response = $client-&gt;put(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'nombre' =&gt; 'Cliente Regular',
            'descripcion' =&gt; 'Acceso a descuentos estándar',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-PUTapi-tipo-cliente--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;nombre&quot;: &quot;Cliente Regular&quot;,
    &quot;descripcion&quot;: &quot;Acceso a descuentos est&aacute;ndar&quot;,
    &quot;created_at&quot;: &quot;2025-10-28T20:00:00.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-10-29T12:00:00.000000Z&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tipo de cliente no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-tipo-cliente--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-tipo-cliente--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-tipo-cliente--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-tipo-cliente--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-tipo-cliente--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-tipo-cliente--id-" data-method="PUT"
      data-path="api/tipo-cliente/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-tipo-cliente--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-tipo-cliente--id-"
                    onclick="tryItOut('PUTapi-tipo-cliente--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-tipo-cliente--id-"
                    onclick="cancelTryOut('PUTapi-tipo-cliente--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-tipo-cliente--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/tipo-cliente/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-tipo-cliente--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-tipo-cliente--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-tipo-cliente--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del tipo de cliente. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nombre</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nombre"                data-endpoint="PUTapi-tipo-cliente--id-"
               value="Cliente Regular"
               data-component="body">
    <br>
<p>Nombre del tipo de cliente. Example: <code>Cliente Regular</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>descripcion</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="descripcion"                data-endpoint="PUTapi-tipo-cliente--id-"
               value="Acceso a descuentos estándar"
               data-component="body">
    <br>
<p>Descripción del tipo de cliente. Example: <code>Acceso a descuentos estándar</code></p>
        </div>
        </form>

                    <h2 id="tipos-de-cliente-adm-DELETEapi-tipo-cliente--id-">Eliminar un tipo de cliente

Elimina un tipo de cliente por su ID.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-tipo-cliente--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/tipo-cliente/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/tipo-cliente/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/tipo-cliente/1';
$response = $client-&gt;delete(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-DELETEapi-tipo-cliente--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tipo de cliente eliminado correctamente&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Tipo de cliente no encontrado&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-tipo-cliente--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-tipo-cliente--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-tipo-cliente--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-tipo-cliente--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-tipo-cliente--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-tipo-cliente--id-" data-method="DELETE"
      data-path="api/tipo-cliente/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-tipo-cliente--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-tipo-cliente--id-"
                    onclick="tryItOut('DELETEapi-tipo-cliente--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-tipo-cliente--id-"
                    onclick="cancelTryOut('DELETEapi-tipo-cliente--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-tipo-cliente--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/tipo-cliente/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-tipo-cliente--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-tipo-cliente--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-tipo-cliente--id-"
               value="1"
               data-component="url">
    <br>
<p>ID del tipo de cliente. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="z-flujo-de-redimicion-de-clientes">Z Flujo de Redimición de Clientes</h1>

    <p>Guarda un nuevo registro de cupón redimido por un usuario.</p>

                                <h2 id="z-flujo-de-redimicion-de-clientes-GETapi-comercio--id--campanias">Obtener campañas de un almacén

Retorna el almacén junto con sus campañas y cupones asociados.</h2>

<p>
</p>



<span id="example-requests-GETapi-comercio--id--campanias">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/comercio/5/campanias" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/comercio/5/campanias"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/comercio/5/campanias';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-comercio--id--campanias">
            <blockquote>
            <p>Example response (200, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 5,
    &quot;nombre&quot;: &quot;Tienda NamNam&quot;,
    &quot;categoria&quot;: {
        &quot;id&quot;: 1,
        &quot;nombre&quot;: &quot;Comida&quot;
    },
    &quot;campanias&quot;: [
        {
            &quot;id&quot;: 10,
            &quot;titulo&quot;: &quot;Promo Halloween&quot;,
            &quot;cupones&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;codigo&quot;: &quot;HALLO50&quot;,
                    &quot;descuento&quot;: &quot;50%&quot;
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-comercio--id--campanias" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-comercio--id--campanias"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-comercio--id--campanias"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-comercio--id--campanias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-comercio--id--campanias">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-comercio--id--campanias" data-method="GET"
      data-path="api/comercio/{id}/campanias"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-comercio--id--campanias', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-comercio--id--campanias"
                    onclick="tryItOut('GETapi-comercio--id--campanias');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-comercio--id--campanias"
                    onclick="cancelTryOut('GETapi-comercio--id--campanias');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-comercio--id--campanias"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/comercio/{id}/campanias</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-comercio--id--campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-comercio--id--campanias"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-comercio--id--campanias"
               value="5"
               data-component="url">
    <br>
<p>ID del almacén. Example: <code>5</code></p>
            </div>
                    </form>

                    <h2 id="z-flujo-de-redimicion-de-clientes-GETapi-cupones-redimidos-user--userId-">Obtener cupones redimidos por usuario</h2>

<p>
</p>

<p>Devuelve todos los cupones redimidos asociados a un usuario específico.</p>

<span id="example-requests-GETapi-cupones-redimidos-user--userId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/cupones-redimidos/user/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones-redimidos/user/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones-redimidos/user/consequatur';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-cupones-redimidos-user--userId-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cupones redimidos encontrados.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;couponId&quot;: 10,
            &quot;comercioId&quot;: 3,
            &quot;created_at&quot;: &quot;2025-10-25T18:22:14.000000Z&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No se encontraron cupones redimidos para este usuario.&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cupones-redimidos-user--userId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cupones-redimidos-user--userId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cupones-redimidos-user--userId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cupones-redimidos-user--userId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cupones-redimidos-user--userId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cupones-redimidos-user--userId-" data-method="GET"
      data-path="api/cupones-redimidos/user/{userId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cupones-redimidos-user--userId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cupones-redimidos-user--userId-"
                    onclick="tryItOut('GETapi-cupones-redimidos-user--userId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cupones-redimidos-user--userId-"
                    onclick="cancelTryOut('GETapi-cupones-redimidos-user--userId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cupones-redimidos-user--userId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cupones-redimidos/user/{userId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cupones-redimidos-user--userId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cupones-redimidos-user--userId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="userId"                data-endpoint="GETapi-cupones-redimidos-user--userId-"
               value="consequatur"
               data-component="url">
    <br>
<p>El identificador del usuario (por ejemplo, &quot;fb_19823&quot;). Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="z-flujo-de-redimicion-de-clientes-POSTapi-cupones-redimidos">Registrar un nuevo cupón redimido</h2>

<p>
</p>



<span id="example-requests-POSTapi-cupones-redimidos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/cupones-redimidos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id_usuario\": 5,
    \"userId\": \"fb_19823\",
    \"couponId\": 10,
    \"comercioId\": 3
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cupones-redimidos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id_usuario": 5,
    "userId": "fb_19823",
    "couponId": 10,
    "comercioId": 3
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/cupones-redimidos';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'id_usuario' =&gt; 5,
            'userId' =&gt; 'fb_19823',
            'couponId' =&gt; 10,
            'comercioId' =&gt; 3,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-cupones-redimidos">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cup&oacute;n redimido registrado con &eacute;xito.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;couponId&quot;: 10,
        &quot;userId&quot;: &quot;fb_19823&quot;,
        &quot;created_at&quot;: &quot;2025-10-25T18:22:14.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (409):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Este cup&oacute;n ya fue redimido por este usuario.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Error de validaci&oacute;n.&quot;,
    &quot;errors&quot;: {
        &quot;couponId&quot;: [
            &quot;El campo couponId es obligatorio.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-cupones-redimidos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cupones-redimidos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cupones-redimidos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cupones-redimidos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cupones-redimidos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cupones-redimidos" data-method="POST"
      data-path="api/cupones-redimidos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cupones-redimidos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cupones-redimidos"
                    onclick="tryItOut('POSTapi-cupones-redimidos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cupones-redimidos"
                    onclick="cancelTryOut('POSTapi-cupones-redimidos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cupones-redimidos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cupones-redimidos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cupones-redimidos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cupones-redimidos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_usuario</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id_usuario"                data-endpoint="POSTapi-cupones-redimidos"
               value="5"
               data-component="body">
    <br>
<p>nullable ID del usuario autenticado (si aplica). Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="userId"                data-endpoint="POSTapi-cupones-redimidos"
               value="fb_19823"
               data-component="body">
    <br>
<p>nullable ID del usuario externo (por ejemplo, Firebase). Example: <code>fb_19823</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>couponId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="couponId"                data-endpoint="POSTapi-cupones-redimidos"
               value="10"
               data-component="body">
    <br>
<p>ID del cupón que se está redimiendo. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comercioId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="comercioId"                data-endpoint="POSTapi-cupones-redimidos"
               value="3"
               data-component="body">
    <br>
<p>nullable ID del comercio asociado al cupón. Example: <code>3</code></p>
        </div>
        </form>

                    <h2 id="z-flujo-de-redimicion-de-clientes-POSTapi-asignaciones">Crear una nueva asignación (canje de cupón)</h2>

<p>
</p>

<p>Crea una relación entre un usuario y un cupón.
Si el cupón ya fue canjeado por el mismo usuario, se devolverá un error 409.</p>

<span id="example-requests-POSTapi-asignaciones">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/asignaciones" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"cupon_id\": 12,
    \"user_id\": 5,
    \"userId\": 101,
    \"comercio_id\": 3,
    \"fecha_canje\": \"2025-10-29\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/asignaciones"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "cupon_id": 12,
    "user_id": 5,
    "userId": 101,
    "comercio_id": 3,
    "fecha_canje": "2025-10-29"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://127.0.0.1:8000/api/asignaciones';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'cupon_id' =&gt; 12,
            'user_id' =&gt; 5,
            'userId' =&gt; 101,
            'comercio_id' =&gt; 3,
            'fecha_canje' =&gt; '2025-10-29',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-asignaciones">
            <blockquote>
            <p>Example response (201, Éxito):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cup&oacute;n asignado correctamente.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;cupon_id&quot;: 12,
        &quot;user_id&quot;: 5,
        &quot;fecha_canje&quot;: &quot;2025-10-29&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (409, Duplicado):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;El usuario ya canje&oacute; este cup&oacute;n.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validación):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Debe proporcionar al menos user_id o userId.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-asignaciones" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-asignaciones"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-asignaciones"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-asignaciones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-asignaciones">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-asignaciones" data-method="POST"
      data-path="api/asignaciones"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-asignaciones', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-asignaciones"
                    onclick="tryItOut('POSTapi-asignaciones');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-asignaciones"
                    onclick="cancelTryOut('POSTapi-asignaciones');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-asignaciones"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/asignaciones</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-asignaciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-asignaciones"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>cupon_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cupon_id"                data-endpoint="POSTapi-asignaciones"
               value="12"
               data-component="body">
    <br>
<p>ID del cupón a asignar. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-asignaciones"
               value="5"
               data-component="body">
    <br>
<p>optional ID del usuario (si está autenticado). Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="userId"                data-endpoint="POSTapi-asignaciones"
               value="101"
               data-component="body">
    <br>
<p>optional ID alternativo del usuario (desde app externa). Example: <code>101</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>comercio_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="comercio_id"                data-endpoint="POSTapi-asignaciones"
               value="3"
               data-component="body">
    <br>
<p>optional ID del comercio donde se canjeó. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fecha_canje</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fecha_canje"                data-endpoint="POSTapi-asignaciones"
               value="2025-10-29"
               data-component="body">
    <br>
<p>optional Fecha del canje. Example: <code>2025-10-29</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
