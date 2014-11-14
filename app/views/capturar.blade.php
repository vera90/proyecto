<!DOCTYPE html>
<html lang=”en”>
<head>
        <meta charset=”utf-8”>
        <title>Awesome HTML5 Webpage</title>
        <meta name=”description” content=”An awesome HTML5 page YOU built from scratch!”>
        <meta name=”author” content=”Udemy”>
</head>
<body>
{{ Form::open(array('url' => '/procesar')) }}
        {{ Form::label('rfc', 'Rfc:') }}
        {{ Form::text('rfc', '') }}
<br/>
        {{ Form::label('nombre', 'Nombre o razón social:') }}
        {{ Form::text('nombre', '') }}
<br/>
        {{ Form::label('calle', 'Calle:') }}
        {{ Form::text('calle', '') }} 
<br/>
        {{ Form::label('num_ext', 'Número exterior:') }}
        {{ Form::text('num_ext', '') }}
<br/>
        {{ Form::label('num_int', 'Número interior:') }}
        {{ Form::text('num_int', '') }} 
<br/>
        {{ Form::label('colonia', 'Colonia:') }}
        {{ Form::text('colonia', '') }} 
<br/>
        {{ Form::label('cp', 'CP:') }}
        {{ Form::text('cp', '') }} 
<br/>
        {{ Form::label('ciudad', 'Ciudad, población, localidad:') }}
        {{ Form::text('ciudad', '') }}
<br/>
        {{ Form::submit('Guardar') }}
{{ Form::close() }}
</body>
</html>