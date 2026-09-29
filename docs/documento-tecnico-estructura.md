# Documento técnico — Gestor ADSO

> Plantilla de trabajo. Sustituye cada instrucción entre corchetes con tu análisis y evidencia real. No entregues apartados con marcadores pendientes ni uses capturas sin explicar qué demuestran.

## Portada

- **Proyecto:** Gestor ADSO — administración de aprendices
- **Aprendiz:** Diego Andrés Morelo Henao
- **Identificación:** 1063145978
- **Competencia:** Programación con PHP y Laravel
- **Resultado de aprendizaje:** Elaborar propuesta técnica del software de acuerdo con las especificaciones técnicas definidas
- **Instructor:** []
- **Centro / ficha:** [completar]
- **Fecha de entrega:** 1 de octubre de 2026

## 1. Diagnóstico de las dificultades

[Describe tu punto de partida, las dificultades que encontraste y cómo las comprobaste. Distingue el problema, su causa y la solución que aplicaste.]

## 2. Objetivo y alcance

### Objetivo general
[Explica qué necesidad resuelve Gestor ADSO.]

### Alcance funcional
[Describe aprendices, autenticación, roles y administración de usuarios. Indica también las limitaciones actuales.]

## 3. Requisitos y decisiones técnicas

| ID | Requisito | Decisión/implementación | Evidencia | Estado |
|---|---|---|---|---|
| R-01 | Instalación desde cero con PHP/Laravel/Composer | [completar] | [E-01] | [ ] |
| R-02 | Persistencia, migraciones, Factory, Seeder y Eloquent | [completar] | [E-02] | [ ] |
| R-03 | CRUD de aprendices, búsqueda y paginación | [completar] | [E-03] | [ ] |
| R-04 | Validación con Form Request | [completar] | [E-04] | [ ] |
| R-05 | Autenticación Breeze y rutas protegidas | [completar] | [E-05] | [ ] |
| R-06 | Roles, Gate, Policy y middleware can | [completar] | [E-06] | [ ] |
| R-07 | Administración de usuarios y protección de autoeliminación | [completar] | [E-07] | [ ] |
| R-08 | Repositorio, README y rama plan-mejoramiento | [completar] | [E-08] | [ ] |

## 4. Arquitectura MVC

[Explica con tus palabras qué responsabilidades tienen Modelo, Vista y Controlador en esta aplicación.]

### Estructura de carpetas relevante

| Carpeta/archivo | Responsabilidad en Gestor ADSO |
|---|---|
| `app/Models` | [completar] |
| `app/Http/Controllers` | [completar] |
| `app/Http/Requests` | [completar] |
| `app/Policies` | [completar] |
| `database/migrations` | [completar] |
| `database/seeders` y `database/factories` | [completar] |
| `resources/views` | [completar] |
| `routes/web.php` | [completar] |

### Flujo de una petición

[Incluye un ejemplo concreto y propio: URL → ruta/middleware → controlador → Form Request/Policy → modelo/Eloquent → vista Blade o redirección.]

## 5. Modelo de datos

[Inserta un diagrama o esquema de tablas. Explica claves, restricciones `unique`, tipos de datos y por qué se eligieron. Describe la relación entre cuentas y roles y la tabla de aprendices.]

## 6. Desarrollo por clases / resultados

### Clase 1 — Instalación y primer arranque
[Versiones realmente verificadas, requisitos, instalación limpia, `.env.example`, creación de BD, clave, migraciones y comandos de arranque.]

### Clase 2 — Routing y controladores REST
[Explica rutas resource/REST implementadas, nombres, parámetros, middleware y un ejemplo de acción.]

### Clase 3 — Migraciones, modelos, seeders y Eloquent
[Explica Aprendiz, User, `$fillable`, consultas, Factory, Seeder, restricciones y paginación.]

### Clase 4 — CRUD y Form Request
[Explica crear/listar/buscar/editar/actualizar/eliminar, reglas personalizadas y comportamiento cuando la validación falla.]

### Clase 5 — Autenticación con Breeze
[Describe registro, inicio/cierre de sesión, protección `auth` y navegación para invitados/autenticados.]

### Clase 6 — Autorización RBAC
[Explica roles admin/instructor/aprendiz, Gate `manage-users`, `AprendizPolicy`, `can`, `authorize()` y `@can`. Justifica qué puede hacer cada rol.]

### Clase 7 — Administración de usuarios
[Explica búsqueda/filtros, asignación de rol, actualización de contraseña, validaciones y bloqueo de autoeliminación en servidor e interfaz.]

## 7. Configuración e instalación reproducible

[Documenta comandos exactos probados desde clon limpio. Explica cómo crear la base de datos, copiar `.env.example`, configurar `DB_*`, ejecutar `key:generate`, migraciones y seeders, instalar assets y arrancar. No incluyas el `.env` real, claves ni contraseñas.]

### Cuentas para verificar roles

| Rol | Correo local de demostración | Cómo se define la contraseña |
|---|---|---|
| Admin | `admin@gestor-adso.test` | Variable local `GESTOR_DEMO_PASSWORD` |
| Instructor | `instructor@gestor-adso.test` | Variable local `GESTOR_DEMO_PASSWORD` |
| Aprendiz | `aprendiz@gestor-adso.test` | Variable local `GESTOR_DEMO_PASSWORD` |

[Explica cómo definir esa variable solo en el `.env` local, ejecutar seeders y verificar que el valor no se publica.]

## 8. Matriz de pruebas

| ID | Rol | Preparación y pasos | Resultado esperado | Resultado observado | Evidencia |
|---|---|---|---|---|---|
| T-01 | Invitado | Abrir ruta protegida de aprendices | Redirección a login | [completar] | [E-] |
| T-02 | Admin | Crear, editar y eliminar aprendiz | Operación permitida | [completar] | [E-] |
| T-03 | Instructor | Intentar administrar usuarios | Acceso denegado | [completar] | [E-] |
| T-04 | Aprendiz | Intentar crear/editar/eliminar aprendiz | Acceso denegado; acciones ocultas | [completar] | [E-] |
| T-05 | Admin | Intentar eliminar su propia cuenta desde administración | Operación bloqueada | [completar] | [E-] |
| T-06 | Admin | Enviar contraseña débil o confirmación distinta | Mensajes de validación | [completar] | [E-] |
| T-07 | Admin | Buscar y filtrar cuentas | Resultados correspondientes | [completar] | [E-] |
| T-08 | Admin | Asignar cada rol a una cuenta | Rol guardado y permisos efectivos | [completar] | [E-] |

> Registra resultados reales. No marques aprobada una prueba que no hayas ejecutado.

## 9. Evidencias numeradas y análisis

[Inserta las capturas según `docs/guia-capturas-evidencias.md`. Para cada una escribe qué pantalla/acción se observa, qué requisito comprueba y qué conclusión obtuviste. Oculta datos personales y cualquier secreto.]

## 10. Riesgos y controles

| Riesgo | Impacto | Control implementado | Evidencia / limitación |
|---|---|---|---|
| Usuario no autorizado cambia datos | [completar] | Middleware + Policy + autorización en controlador | [completar] |
| Contraseña expuesta | [completar] | Hash de contraseña; no publicar `.env` | [completar] |
| Datos duplicados | [completar] | Validación + índices únicos en BD | [completar] |
| Autoeliminación de administrador | [completar] | Comprobación del usuario autenticado | [completar] |

## 11. Conclusiones

[Resume qué aprendiste, qué requisitos comprobaste y qué mejorarías después. Redacta desde tu experiencia.]

## 12. Referencias

[Incluye documentación oficial consultada: Laravel, PHP, Composer, MariaDB/MySQL, Laravel Breeze y fuentes del curso. Añade URL y fecha de consulta.]
