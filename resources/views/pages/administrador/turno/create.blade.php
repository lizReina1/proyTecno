<x-app-layout>
    <div class="container-fluid d-flex justify-content-center aling-items-center">
        <div class="card" style="width: 100%;">

            <div class="card-body bg-white p-5">
                <div class="dias" data-dias="<?php echo htmlspecialchars(json_encode($dias)); ?>" hidden></div>
                <form action="{{ route('turno.store') }}" method="POST" enctype="multipart/form-data" id="formServicio">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-4">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Crear servicio</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Registrar un nuevo servicio.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                {{-- <div class="sm:col-span-3">
                                    <label for="nombre"
                                        class="block text-sm font-medium leading-6 text-gray-900">Nombre del
                                        servicio</label>
                                    <div class="mt-2">
                                        <input type="text" name="nombre" id="nombre" autocomplete="given-nombre"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('nombre')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorNombre"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="costo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Costo</label>
                                    <div class="mt-2">
                                        <input type="number" name="costo" id="costo" autocomplete="given-costo"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('costo')
                                            <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                {{ $message }}</div>
                                        @enderror
                                        <span id="errorCosto"
                                            class="error-message mt-1 text-sm leading-6 text-pink-600"></span>
                                    </div>
                                </div> --}}
                                <div class="sm:col-span-3">
                                    <label for="dia"
                                        class="block text-sm font-medium leading-6 text-gray-900">Día</label>
                                    <div class="mt-2">
                                        <select type="text" name="dia" id="dia"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="Lunes" selected>Lunes</option>
                                            <option value="Martes">Martes</option>
                                            <option value="Miércoles">Miercoles</option>
                                            <option value="Jueves">Jueves</option>
                                            <option value="Viernes">Viernes</option>
                                            <option value="Sábado">Sabado</option>
                                            <option value="Domingo">Domingo</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="turno_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">Horario</label>
                                    <div class="mt-2">
                                        <select type="text" name="turno_id" id="turno_id" autocomplete="atencion"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            @foreach ($dias['Lunes'] as $horario)
                                                <option value={{ $horario['id'] }}>{{ $horario['hora_inicio'] }} -
                                                    {{ $horario['hora_fin'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="tipo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Tipo</label>
                                    <div class="mt-2">
                                        <select type="text" name="tipo" id="tipo" autocomplete="atencion"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="M" selected>Médico</option>
                                            <option value="E">Enfermera</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="tipo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Tipo</label>
                                    <div class="mt-2">
                                        <select type="text" name="tipo" id="tipo" autocomplete="atencion"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            @foreach ($servicios['MEDICO'] as $servicio)
                                                <option value="{{ $servicio['id'] }}">{{ $servicio['nombre'] }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-span-full">
                                    <label for="photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Imagen</label>
                                    <div class="mt-2 flex items-center gap-x-3">
                                        <!-- component -->
                                        <div class="flex items-center space-x-6">
                                            <div class="shrink-0">
                                                <img id="preview" class="h-16 w-16 object-cover rounded-full"
                                                    src="{{ asset('estilos_tecno/img/sin_img.png') }}"
                                                    alt="Current servicio photo" />
                                                @error('imagen')
                                                    <div class="error-message mt-1 text-sm leading-6 text-pink-600">
                                                        {{ $message }}</div>
                                                @enderror
                                                <span id="errorImagen"
                                                    class="error-message mt-1 text-sm leading-6 text-pink-600"></span>

                                            </div>
                                            <label class="block">
                                                <span class="sr-only">Seleccionar foto de servicio</span>
                                                <input type="file" id="imagen" name="imagen" accept="image/*"
                                                    class="block w-full text-sm text-slate-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-violet-50 file:text-gray-500
                                                hover:file:bg-violet-100
                                              " />

                                            </label>
                                        </div>


                                        {{-- <div class="bg-white p7 rounded w-9/12 mx-auto">
                                         
                                        </div> --}}
                                {{-- </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="mt-2 flex items-center justify-end gap-x-6">
                            <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
                        </div>
                </form>

            </div>
        </div>
    </div>

    {{-- JS --}}
    <script>
        var dias = $('.dias').data('dias');
        console.log(dias);
        $('#dia').change(function() {
            var dia = $(this).val(); // obtén el día seleccionado
            var turnos = dias[dia]; // obtén los turnos para ese día

            var $turnoId = $('#turno_id');
            $turnoId.empty(); // limpia las opciones existentes

            // agrega nuevas opciones basadas en los turnos recibidos
            $.each(turnos, function(index, turno) {
                $turnoId.append($('<option>').val(turno.id).text(turno.hora_inicio + ' - ' + turno
                    .hora_fin));
            });
        });
    </script>
</x-app-layout>
