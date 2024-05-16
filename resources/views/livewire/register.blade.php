<div class="flex h-full justify-center items-center">
    <form wire:submit.prevent="register" class="text-center text-white rounded-lg">
        <div class="w-full max-w-sm p-20 rounded-lg shadow-2xl bg-gray-800 space-y-3">
            <h5 class="text-2xl font-bold">Crear Cuenta</h5>
            <div>
                <label for="name" class="block mb-2 font-medium">Nombre</label>
                <input wire:model="name" type="text" name="email" id="name" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" placeholder="Pepito" required />
            </div>
            <div>
                <label for="lastname" class="block mb-2 font-medium">Apellido</label>
                <input wire:model="lastname" type="text" name="lastname" id="lastname" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" placeholder="Perez" required />
            </div>
            <div>
                <label for="phone" class="block mb-2 font-medium">Teléfono</label>
                <input wire:model="phone" type="text" name="phone" id="phone" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" placeholder="3148756544" required />
            </div>
            <div>
                <label for="email" class="block mb-2 font-medium">Correo Electrónico</label>
                <input wire:model="email" type="email" name="email" id="email" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" placeholder="name@email.com" required />
            </div>
            <div>
                <label for="password" class="block mb-2 font-medium">Contraseña</label>
                <input wire:model="password" type="password" name="password" id="password" placeholder="••••••••" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" required />
            </div>
            <div>
                <label for="confirmPassword" class="block mb-2 font-medium">Confirmar Contraseña</label>
                <input wire:model="confirmPassword" type="password" name="confirmPassword" id="confirmPassword" placeholder="••••••••" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" required />
            </div>
            <button type="submit" class="w-full focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Registrarme</button>
            <div>
                <span>¿Ya tienes una cuenta?</span>
                <a class="font-bold" href="{{ route('login') }}">Ingresar</a>
            </div>
            @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </form>
</div>
