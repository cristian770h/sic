<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <h1 class="text-2xl font-bold">Listado de estudiantes</h1>

    <div>
        <a href="{{url('students/create')}}">
            <button class="bg-blue-500  w-32 h-22 font-bold rounded-md hover:bg-blue-300">Agregar estudiantes</button>
        </a>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>id_alumno</th>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumno as $alumno)
                <tr>
                    <td>asdsa</td>
                    <td>{{$alumno->id_student}}</td>
                    <td>{{$alumno->name_student}}</td>
                    <td>{{$alumno->last_name_student}}</td>
                    <td>{{$alumno->birthday}}</td>
                    <td>{{$alumno->descripcion}}</td>
                    <td>
                        <a href="{{url('students/'.$alumno->id.'/edit')}}">
                            <button class="bg-blue-500 w-32 h-22 font-bold rounded-md hover:bg-blue-300">Editar</button>
                        </a>
                        <form action="{{url('students/'.$alumno->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500  w-32 h-22 font-bold rounded-md hover:bg-blue-300">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>