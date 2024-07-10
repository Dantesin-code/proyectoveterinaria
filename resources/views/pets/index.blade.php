<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Mascotas') }}
        </h2>
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('pets.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Registrar Mascota</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Nombre</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Especie</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Raza</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Edad</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pets as $pet)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $pet->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $pet->name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $pet->species }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $pet->breed }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $pet->age }}</td>

                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('pets.edit', $pet->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">editar</a>
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $pet->id }}')">eliminar</button>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        alertify.confirm("¿Estas seguro de eliminar este registro?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/pets/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
            alertify.success('eliminado con exito');
        },
        function(){
            alertify.error('Cancelado');
        });
    }
</script>