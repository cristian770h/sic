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
        <form action="{{ url('students/.$student->id') }}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" name="name_student" placeholder="Nombre" value="{{ $alumno->name_student}}">
            @error('name_student')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <input type="number" name="id_student" placeholder="Matricula" value="{{  $alumno->id_student }}">
            <input type="text" name="last_name_student" placeholder="Apellido estudiante"
                value="{{  $alumno->last_name_student }}">
            <input type="date" name="birthday" placeholder="Fecha de nacimiento" value="{{  $alumno->birthday }}">
            <input type="text" name="descripcion" placeholder="descripcion" value="{{  $alumno->descripcion }}">
            <div>
                <a href="{{ url('asda') }}">
                    <button class="bg-gray-500  w-32 h-22 font-bold rounded-md hover:bg-blue-300">Regresar</button></a>
                <button type="submit"
                    class=" bg-blue-500 w-32 h-22 font-bold rounded-md hover:bg-blue-300">Actualizar</button>
            </div>
        </form>

    </div </body>

</html>
