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
        <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Crear</button>
        </a>
    </div>
    <div>
@if(session()->has('notificacion'))
<div>{{session('notificacion')}}</div>
@endif
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id_alumno
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Matricula
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de nacimiento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumno as $alumno)
                    <tr
                        class="odd:bg-white  even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            1
                        </th>
                        <td class="px-6 py-4">
                            {{$alumno->id_student}}
                        </td>
                        <td class="px-6 py-4">
                            {{$alumno->name_student}}
                        </td>
                        <td class="px-6 py-4">
                            {{$alumno->last_name_student}}
                        </td>
                        <td class="px-6 py-4">
                            {{$alumno->birthday}}
                        </td>
                        <td class="px-6 py-4">
                            {{$alumno->descripcion}}
                        </td>
                        <td>
                            <a href="{{route ('students.show',$alumno->id)}}">
                        <button class="bg-blue-500 w-32 h-22 font-bold rounded-md hover:bg-blue-300">vermas

                        </button>
                    </a>
                        </td>
                        <td class="flex ">

                            <a href="{{url('students/'.$alumno->id.'/edit')}}">
                                <button
                                    class="bg-blue-500 w-32 h-22 font-bold rounded-md hover:bg-blue-300">Editar</button>
                            </a>
                            <form action="{{url('students/'.$alumno->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="bg-red-500  w-32 h-22 font-bold rounded-md hover:bg-blue-300">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                
            </div>
        </div>

</html>