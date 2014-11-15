<!DOCTYPE html>
<html>
    <head>
        <title>Capturar datos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div class="bs-example">
            {{ Form::open( array('url' => '/procesar')) }}
            <div class="form-group">
                {{ Form::label('nombre', 'Nombre o razon social:') }}
                {{ Form::text('nombre', '', array( 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre')) }}
            </div>
            {{ Form::close() }}
        </div>
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>