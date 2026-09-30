# Gestor ADSO

Proyecto integrador desarrollado como parte del proceso de formación del **Análisis y Desarrollo de Software (ADSO)**. Este proyecto tiene como finalidad aplicar los conocimientos adquiridos en el desarrollo de aplicaciones web utilizando **Laravel**, **PHP** y **MariaDB**.

---

# Objetivo del Proyecto

Desarrollar una aplicación web denominada **Gestor ADSO**, orientada a la administración y gestión de información, implementando buenas prácticas de desarrollo de software, arquitectura MVC, manejo de bases de datos y control de versiones mediante Git y GitHub.

---

# Tecnologías Utilizadas

| Tecnología | Versión      |
| ---------- | ------------ |
| PHP        | 8.2.12       |
| Laravel    | 12.64.0      |
| Composer   | 2.x          |
| Node.js    | 22.x         |
| npm        | 10.x         |
| MariaDB    | 10.x (XAMPP) |

> **Nota:** Verificar las versiones instaladas en cada equipo antes de ejecutar el proyecto.

---

# Instalación del Proyecto

## 1. Clonar el repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
```

Entrar al proyecto:

```bash
cd gestor-adso
```

---

## 2. Instalar dependencias de PHP

```bash
composer install
```

---

## 3. Instalar dependencias de Node.js

```bash
npm install
```

---

# ⚙Configuración del Entorno

## Crear el archivo `.env`

Copiar el archivo de ejemplo:

```bash
cp .env.example .env
```

En Windows PowerShell:

```powershell
copy .env.example .env
```

---

## Generar la clave de la aplicación

```bash
php artisan key:generate
```

---

## Configurar la Base de Datos

Editar el archivo `.env` con los datos correspondientes.

Ejemplo:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=
```

> **Importante:** En este proyecto MariaDB se encuentra configurado en el puerto **3307**, debido a un conflicto con una instalación previa de MySQL Workbench que utilizaba el puerto **3306**.

---

# Ejecutar las Migraciones

Crear las tablas de la base de datos:

```bash
php artisan migrate
```

Si se requiere reiniciar completamente la base de datos:

```bash
php artisan migrate:fresh
```

---

# ▶ Iniciar el Proyecto

## Iniciar el servidor Laravel

```bash
php artisan serve
```

La aplicación estará disponible en:

```
http://127.0.0.1:8000
```

---

## Compilar los recursos del frontend

Modo desarrollo:

```bash
npm run dev
```

Modo producción:

```bash
npm run build
```

---

# Problemas Encontrados y Soluciones Aplicadas

## Problema 1

### Error

```
MySQL shutdown unexpectedly
```

### Causa

Existía un conflicto entre MariaDB de XAMPP y una instalación previa de MySQL utilizando el puerto **3306**.

### Solución

- Cambiar el puerto de MariaDB a **3307**.
- Configurar phpMyAdmin para utilizar el nuevo puerto.
- Actualizar el archivo `.env` con el puerto correspondiente.

---

## Problema 2

### Error

```
SQLSTATE[HY000] [2002]
Connection refused
```

### Causa

El servidor MariaDB no se encontraba iniciado.

### Solución

Iniciar el servicio **MySQL** desde el Panel de Control de XAMPP antes de ejecutar el proyecto.

---

## Problema 3

### Error

```
ECONNRESET
```

### Causa

El servidor Laravel no estaba disponible o existían problemas de comunicación con el servicio local.

### Solución

- Ejecutar:

```bash
php artisan serve
```

- Verificar que la URL utilizada fuera:

```
http://127.0.0.1:8000
```

---

# Autor

**Nombre:** Diego Andrés Morelo Henao

**Programa:** Análisis y Desarrollo de Software (ADSO)

**SENA**

**Ficha:** _3314811_

---


#  Licencia

Proyecto desarrollado con fines académicos como evidencia de aprendizaje del programa ADSO del SENA.

---

# Roles y administración

La aplicación incluye tres roles:

- **admin:** administra usuarios (búsqueda, filtro, creación, edición, asignación de roles y eliminación) y gestiona aprendices.
- **instructor:** consulta y administra aprendices; no puede acceder a la administración de usuarios.
- **aprendiz:** consulta el listado; las operaciones de escritura quedan denegadas también si intenta abrir directamente una URL protegida.

El administrador no puede eliminar su propia cuenta desde el módulo de administración. Los permisos de aprendices se comprueban en rutas, Policy, controlador/Form Request y vistas.

## Rutas principales

| Ruta | Acceso | Función |
|---|---|---|
| `/` | Público | Página de inicio |
| `/login`, `/register` | Invitado | Autenticación Breeze |
| `/dashboard` | Autenticado | Panel principal |
| `/aprendices` | Autenticado con permiso de lectura | Búsqueda y listado |
| `/aprendices/create` | Admin e instructor | Crear aprendiz |
| `/admin/users` | Solo admin | Administrar usuarios |
| `/profile` | Autenticado | Perfil propio |
