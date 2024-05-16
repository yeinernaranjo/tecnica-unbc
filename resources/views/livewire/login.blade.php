<div class="flex h-full justify-center items-center">
    <form wire:submit.prevent="attemptLogin" class="text-center text-white rounded-lg">
        <div class="w-full max-w-sm p-20 rounded-lg shadow-2xl bg-gray-800 space-y-5">
            <h5 class="text-2xl font-bold">Iniciar Sesión</h5>
            <div>
                <label for="email" class="block mb-2 font-medium">Correo Electrónico</label>
                <input wire:model="email" type="email" name="email" id="email" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" placeholder="name@email.com" />
            </div>
            <div>
                <label for="password" class="block mb-2 font-medium">Contraseña</label>
                <input wire:model="password" type="password" name="password" id="password" placeholder="••••••••" class="outline-none rounded-lg focus:ring focus:ring-blue-500 focus:border-blue-500 block w-full p-2 bg-gray-600 border-gray-500 placeholder-gray-400" />
            </div>
            <button type="submit" class="w-full focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Ingresar</button>
            <div>
                <span>¿No tienes una cuenta?</span>
                <a class="font-bold" href="{{ route('register') }}">Registrarme</a>
            </div>
            <div>
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
        </div>
    </form>
</div>
