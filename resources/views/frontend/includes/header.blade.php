<nav class="bg-white drop-shadow-md" x-data="{ showMobileNav: false }">
    <div class="max-w-7xl mx-auto px-2 py-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button @click="showMobileNav = !showMobileNav" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">{{__('Open main menu')}}</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center content-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img class="block lg:hidden h-10 w-auto" src="{{asset('img/logo-with-text.jpg')}}" alt="{{ app_name() }}">
                    </a>
                    <a href="/">
                        {{-- <img class="hidden lg:block h-12 w-auto" src="{{asset('img/logo-with-text-dark.png')}}" alt="{{ app_name() }}"> --}}
                        <img class="hidden lg:block h-12 w-auto" src="data:image/png;base64,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" alt="{{ app_name() }}">

                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        {{-- <a href="{{ route('frontend.posts.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                            {{__('Posts')}}
                        </a>
                        <a href="{{ route('frontend.categories.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                            {{__('Categories')}}
                        </a>
                        <a href="{{ route('frontend.tags.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                            {{__('Tags')}}
                        </a>
                        <a href="{{ route('frontend.comments.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                            {{__('Comments')}}
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="ml-3 relative" x-data="{ isUserMenuOpen: false }">
                    <div class="flex flex-row">
                        @guest
                        <a href="" class="flex items-center mx-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-orange-500 invisible md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="mx-1">{{__('Home')}}</span>
                        </a>


                        <a href="{{ route('login') }}" class="flex items-center mx-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-orange-500 invisible md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="mx-1">{{__('Admin Login')}}</span>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center mx-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-orange-500 invisible md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="mx-1">{{__('Teacher Login')}}</span>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center mx-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-orange-500 invisible md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="mx-1">{{__('Student Login')}}</span>
                        </a>
                        @if(user_registration())
                        <a href="{{ route('register') }}" class="flex items-center mx-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-orange-500 invisible md:visible">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="mx-1">{{__('Register')}}</span>
                        </a>
                        @endif
                        @else
                        <button @click="isUserMenuOpen = !isUserMenuOpen" @keydown.escape="isUserMenuOpen = false" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-offset-cyan-800 focus:ring-white transition ease-out duration-300" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">{{__('Open main menu')}}</span>
                            <img class="h-10 w-10 rounded-full border-transparent border hover:border-cyan-600" src="{{asset(auth()->user()->avatar)}}" alt="{{asset(auth()->user()->name)}}">
                        </button>
                        @endguest
                    </div>

                    @auth
                    <div x-show="isUserMenuOpen" @click.away="isUserMenuOpen = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                        @can('view_backend')
                        <a href='{{ route("backend.dashboard") }}' class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{__('Admin Dashboard')}}
                        </a>
                        @endif
                        <a href="{{ route('frontend.users.profile', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            <i class="fas fa-user fa-fw"></i>&nbsp;{{ Auth::user()->name }}
                        </a>
                        <a href="{{ route('frontend.users.profileEdit', encode_id(auth()->user()->id)) }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            <i class="fas fa-cogs fa-fw"></i>&nbsp;{{__('Settings')}}
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-600 hover:bg-orange-600 hover:text-white" role="menuitem">
                            {{__('Logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden absolute z-10 w-full p-1" id="mobile-menu" x-show="showMobileNav" @click.away="showMobileNav = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg rounded-md ring-1 ring-black ring-opacity-5">
            <a href="{{ route('frontend.posts.index') }}" class="text-gray-500 block px-3 py-2 rounded-md text-base font-medium">
                {{__('Posts')}}
            </a>
            <a href="{{ route('frontend.categories.index') }}" class="text-gray-500 block px-3 py-2 rounded-md text-base font-medium">
                {{__('Categories')}}
            </a>
            <a href="{{ route('frontend.tags.index') }}" class="text-gray-500 block px-3 py-2 rounded-md text-base font-medium">
                {{__('Tags')}}
            </a>
            <a href="{{ route('frontend.comments.index') }}" class="text-gray-500 block px-3 py-2 rounded-md text-base font-medium">
                {{__('Comments')}}
            </a>

            @can('view_backend')
            <a href='{{ route("backend.dashboard") }}' class="text-gray-500 block px-3 py-2 rounded-md text-base font-medium border" role="menuitem">
                <i class="fas fa-tachometer-alt fa-fw"></i>&nbsp;{{__('Admin Dashboard')}}
            </a>
            @endif


            @guest
            <hr>
            <a href="{{ route('login') }}" class="text-gray-500 block mt-2 px-3 py-2 rounded-md text-base font-medium bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span class="mx-1">{{__('Login')}}</span>
            </a>
            @if(user_registration())
            <a href="{{ route('register') }}" class="text-gray-500 block px-3 py-2 rounded-md text-base font-medium bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="mx-1">{{__('Create an account')}}</span>
            </a>
            @endif
            @endauth
        </div>
    </div>
</nav>