<div class="flex justify-center items-center h-full text-white">
    <div class="space-y-5">
        <div class="text-center">
            @if (session()->has('success'))
            <div class="text-white bg-green-600 py-2 rounded-lg">{{ session('success') }}</div>
            @endif
        </div>

        <form wire:submit.prevent="{{ $user_id ? 'updateUser' : 'createUser' }}">
            <div class="space-y-5">
                <input class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" type="text" wire:model="name" placeholder="Nombre">
                <input class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" type="text" wire:model="lastname" placeholder="Apellido">
                <input class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" type="email" wire:model="email" placeholder="Correo electrónico">
                <input class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" type="text" wire:model="phone" placeholder="Teléfono">
                <input class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" type="password" wire:model="password" placeholder="Contraseña">
                <button class="w-full focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" type="submit">{{ $user_id ? 'Actualizar' : 'Crear' }}</button>
            </div>
        </form>


        <!-- Lista de usuarios -->
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs uppercase bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombres
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellidos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Teléfono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="bg-gray-800 border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium">
                            {{$user->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->lastname}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->phone}}
                        </td>
                        <td class="px-6 py-4 flex justify-center items-center">
                            @if ($user->status == 1)
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                            <span>Activo</span>
                            @else
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                            <span>Inactivo</span>
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->email !== $user->email)
                            <div class="flex gap-4">
                                <button wire:click="editUser({{ $user->id }})">
                                    <svg viewBox="0 0 512 512" height="20">
                                        <path fill="currentColor" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </button>

                                <button wire:click="statusChange({{ $user->id }})">
                                    <svg viewBox="0 0 640 512" height="20">
                                        <path fill="currentColor" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z" />
                                    </svg>
                                </button>

                                <button wire:click="deleteUser({{ $user->id }})">
                                    <svg viewBox="0 0 448 512" height="20">
                                        <path fill="currentColor" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                </button>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
