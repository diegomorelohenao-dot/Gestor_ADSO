# Guía para tomar capturas de evidencias

## Antes de capturar

1. Ejecuta el proyecto en el navegador con una base de datos local ya migrada y con datos de demostración.
2. Usa cuentas de demostración con datos ficticios. No muestres tu archivo `.env`, contraseñas, claves, tokens, datos reales ni la consola con valores secretos.
3. Maximiza el navegador y deja visible la URL y el contenido importante. Cierra menús o ventanas que tapen la evidencia.
4. Guarda los originales en `docs/evidencias/` con nombres secuenciales `E-01-...png`, `E-02-...png`, etc. Mantén una copia de respaldo.
5. Cada imagen debe demostrar una acción o resultado concreto. Debajo escribe qué hiciste, qué esperabas, qué ocurrió y qué requisito demuestra.

## Lista sugerida de capturas

| Evidencia | Pantalla/acción que debes capturar | Debe demostrar |
|---|---|---|
| E-01 | Repositorio en GitHub con README y rama/etiqueta `plan-mejoramiento` | Proyecto publicado y evidencia de control de versiones |
| E-02 | Instalación local: terminal con dependencias/migraciones exitosas, sin secretos visibles | Arranque reproducible desde instalación limpia |
| E-03 | Listado de aprendices con paginación y búsqueda aplicada | Lectura Eloquent, búsqueda y paginación |
| E-04 | Formulario de nuevo aprendiz con datos válidos y luego mensaje de validación con datos inválidos | Validación exitosa y fallida; toma dos imágenes si hace falta |
| E-05 | Formulario de edición y resultado del cambio en el listado | Actualización del CRUD |
| E-06 | Login y navegación después de iniciar sesión; luego logout | Breeze, middleware auth y navegación auth/guest |
| E-07 | Admin: panel de usuarios, búsqueda y filtro por rol | Administración de cuentas |
| E-08 | Admin: formulario de edición de usuario mostrando selector de rol y cambio de contraseña | Asignación de roles y gestión de contraseñas; nunca muestres el valor escrito |
| E-09 | Admin intentando borrarse y mensaje/bloqueo observado | Protección contra autoeliminación |
| E-10 | Instructor intentando abrir administración de usuarios por URL directa | Gate/middleware niega acceso aunque se escriba la URL |
| E-11 | Aprendiz viendo acciones permitidas/ocultas; intenta URL de edición directa | Defensa en interfaz y servidor |
| E-12 | Resultado de la misma acción permitida para admin/instructor y denegada para aprendiz | Comparación efectiva entre roles |
| E-13 | Código de Policy, Gate, rutas `can`, Form Request y `authorize()` | Relación entre código y comportamiento observado; acompaña con explicación propia |
| E-14 | Diagrama o vista del esquema de BD con columna role e índices únicos | Diseño de persistencia y restricciones |

## Cómo hacer capturas útiles

- **Windows:** `Win + Shift + S`, selecciona el área y guarda la captura como PNG en `docs/evidencias/`.
- Usa una captura por resultado, salvo que una secuencia necesite dos pantallas para explicar el antes y el después.
- No recortes la URL en capturas de autorización: ayuda a identificar qué ruta fue probada.
- En errores de acceso, incluye el resultado final (por ejemplo, 403) y explica con qué rol se inició sesión.
- Para validación fallida, muestra el formulario y los mensajes visibles. Evita usar información personal real.
- No fabriques resultados ni edites capturas de modo que cambien lo que realmente ocurrió.

## Texto para acompañar cada captura

**E-XX — [título descriptivo]**

- **Preparación:** [rol, datos ficticios y estado inicial].
- **Acción:** [pasos concretos].
- **Resultado observado:** [lo que muestra la aplicación].
- **Requisito que demuestra:** [ID de la matriz].
- **Análisis:** [por qué el resultado prueba que la función o control trabaja correctamente; si falló, explica la causa y corrección].
