<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif
        <form action="{{ url('alumno') }}" method="POST">
            @csrf
            <input type="text" name="name_student" placeholder="Nombre" value="{{ old('name_student') }}">
            @error('name_student')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <input type="number" name="id_student" placeholder="Matricula" value="{{ old('id_student') }}">
            <input type="text" name="last_name_student" placeholder="Apellido estudiante"
                value="{{ old('last_name_student') }}">
            <input type="date" name="birthday" placeholder="Fecha de nacimiento" value="{{ old('birthday') }}">
            <input type="text" name="descripcion" placeholder="descripcion" value="{{ old('descripcion') }}">
            <div>
                <a href="{{ url('asda') }}">
                    <button class="bg-gray-500  w-32 h-22 font-bold rounded-md hover:bg-blue-300">Regresar</button></a>
                <button type="submit"
                    class=" bg-blue-500 w-32 h-22 font-bold rounded-md hover:bg-blue-300">Crear</button>
            </div>
        </form>

    </div </body>

</html>
