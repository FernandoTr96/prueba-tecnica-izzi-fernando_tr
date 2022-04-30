<header>
    <nav class="bg-black px-8 fixed top-0 right-0 left-0 md:relative z-50">
        @auth
            {{-- logged --}}

            <div class="relative flex items-center justify-between h-16">

                {{-- hamburguer btn --}}
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button id="menuBtn" type="button"
                        class="text-2xl w-10 h-10 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                        <i class="fa-solid fa-xmark hidden"></i>
                    </button>
                </div>
                {{-- hamburguer btn --}}

                {{-- options --}}
                <div class="flex-1 flex items-center justify-center sm:justify-between">

                    <div class="flex-shrink-0 flex items-center">
                        <img class="block w-20 h-auto"
                            src="https://soy.marketing/wp-content/uploads/2020/10/Personal-Brand-1200x800-layout1065-1focf1t.png"
                            alt="izzi">
                        <h2 class="text-white text-2xl font-bold">CRUD</h2>
                    </div>

                    <div class="hidden sm:block sm:ml-6 justify-self-end">
                        <div class="flex space-x-4">

                            <a href="{{ route('homePage') }}"
                                class="{{ request()->routeIs('homePage')? 'text-slate-700 bg-white rounded-md font-semibold': 'text-white hover:text-gray-400 px-3 py-2' }} px-3 py-2 text-sm font-medium"
                                aria-current="page">Home</a>

                            <a href="{{ route('addProductsPage') }}"
                                class="{{ request()->routeIs('addProductsPage')? 'text-slate-700 bg-white rounded-md font-semibold': 'text-white hover:text-gray-400 px-3 py-2' }} px-3 py-2  text-sm font-medium">Agregar
                                productos</a>

                            @if (auth()->user()->getProfile['perfil'] == 'administrador')
                                <a href="{{ route('adminProductsPage') }}"
                                    class="{{ request()->routeIs('adminProductsPage')? 'text-slate-700 bg-white rounded-md font-semibold': 'text-white hover:text-gray-400 px-3 py-2' }} px-3 py-2  text-sm font-medium">Bandeja
                                    de productos</a>
                            @endif

                            {{-- dropdown --}}
                            <div class="relative inline-block text-left">
                                <button type="button" id="dropdownButton"
                                    class="inline-flex justify-center items-center w-full px-4 py-2 text-gray-200 text-sm font-medium hover:text-gray-400  md:border-l-2 md:border-gray-300"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <i class="fa-solid fa-user-tie relative -z-10"></i>
                                    <span class="px-3 relative -z-10">{{ auth()->user()->nombre }}</span>
                                    <i class="fa-solid fa-chevron-down relative -z-10"></i>
                                </button>
                                <div class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <form action="{{ route('logout') }}" method="post">
                                            @method('post')
                                            @csrf
                                            <button type="submit"
                                                class="text-gray-700 hover:bg-slate-100 font-semibold block w-full text-left px-4 py-2 text-sm"
                                                role="menuitem">Cerrar sesión</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- dropdown --}}
                        </div>
                    </div>

                </div>
                {{-- options --}}

            </div>


            {{-- mobile menu --}}
            <div class="sm:hidden fixed left-0 right-0 top-13 h-screen transition-transform scale-0 z-50 bg-black"
                id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <h3 class="text-center text-teal-400 p-2">
                        {{ auth()->user()->nombre }} {{ auth()->user()->apellidoPaterno }}
                    </h3>
                    <a href="{{ route('homePage') }}"
                        class="{{ request()->routeIs('homePage') ? 'bg-white text-slate-600 font-semibold' : 'text-gray-200 hover:bg-gray-700' }} block px-3 py-2 rounded-md  font-medium"
                        aria-current="page">Home</a>
                    <a href="{{ route('addProductsPage') }}"
                        class="{{ request()->routeIs('addProductsPage')? 'bg-white text-slate-600 font-semibold': 'text-gray-200 hover:bg-gray-700' }} block px-3 py-2 rounded-md  font-medium">Agregar
                        productos</a>
                    @if (auth()->user()->getProfile['perfil'] == 'administrador')
                        <a href="{{ route('adminProductsPage') }}"
                            class="{{ request()->routeIs('adminProductsPage')? 'bg-white text-slate-600 font-semibold': 'text-gray-200 hover:bg-gray-700' }} block px-3 py-2 rounded-md font-medium">Bandeja
                            de productos</a>
                    @endif
                    <form action="{{ route('logout') }}" method="post">
                        @method('post')
                        @csrf
                        <button type="submit"
                            class="text-gray-200 hover:bg-gray-700 block px-3 py-2 rounded-md  text-left font-medium w-full"
                            role="menuitem">Cerrar sesión</button>
                    </form>
                </div>
            </div>
            {{-- mobile menu --}}

            {{-- logged --}}
        @else
            {{-- guest --}}
            <div class="flex items-center justify-between px-10 py-3">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-12 w-auto"
                        src="https://soy.marketing/wp-content/uploads/2020/10/Personal-Brand-1200x800-layout1065-1focf1t.png"
                        alt="izzi">
                    <h2 class="text-white text-2xl font-bold">CRUD</h2>
                </div>
                <div class="flex">
                    <a href="{{ route('loginPage') }}"
                        class="{{ request()->routeIs('loginPage')? 'bg-stone-100 text-slate-800 font-semibold': 'hover:text-white hover:bg-gray-700 text-gray-300' }} mx-2 border-2 border-transparent block px-3 py-2 rounded-md text-sm font-medium"
                        aria-current="page">Ingresar</a>

                    <a href="{{ route('registerPage') }}"
                        class="{{ request()->routeIs('registerPage')? 'bg-stone-100 text-slate-800 font-semibold': 'hover:text-white hover:bg-gray-700 text-gray-300' }} mx-2 border-2 border-transparent block px-3 py-2 rounded-md text-sm font-medium">Registro</a>
                </div>
            </div>
            {{-- guest --}}
        @endauth
    </nav>
</header>
