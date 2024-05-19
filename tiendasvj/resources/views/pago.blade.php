@extends('template')
@section('content')
<div class="container">
    <h1>Formulario de Tarjeta Visa</h1>
    <form>
      <label for="nombre">Nombre del Titular:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre del titular" required>
      
      <label for="numero">Número de Tarjeta:</label>
      <input type="text" id="numero" name="numero" placeholder="Ingresa el número de tarjeta" maxlength="16" required>
      
      <label for="fecha">Fecha de Vencimiento:</label>
      <input type="text" id="fecha" name="fecha" placeholder="MM/AA" maxlength="5" required>
      
      <label for="cvv">CVV:</label>
      <input type="number" id="cvv" name="cvv" placeholder="Ingresa el CVV" maxlength="3" required>
      
      <button type="submit">Enviar</button>
    </form>
  </div>
@endsection