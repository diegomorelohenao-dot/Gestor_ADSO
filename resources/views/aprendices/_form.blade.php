<div>
 <label>Nombre</label>
 <input
 type="text"
 name="nombre"
 value="{{ old('nombre', $aprendiz->nombre ?? '') }}"
 >
</div>
<div>
 <label>Documento</label>
 <input
 type="text"
 name="documento"
 value="{{ old('documento', $aprendiz->documento ?? '') }}"
 >
</div>
<div>
 <label>Correo</label>
 <input
 type="email"
 name="correo"
 value="{{ old('correo', $aprendiz->correo ?? '') }}"
 >
</div>
<div>
 <label>Ficha</label>
 <input
 type="number"
 name="ficha_id"
 value="{{ old('ficha_id', $aprendiz->ficha_id ?? '') }}"
 >
</div>
<button type="submit">Guardar</button>
