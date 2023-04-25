<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="height: 5rem; padding-block: .5rem;">
        <div class="flex justify-between h-16 ">
            <div class="grid "  style="line-height: 1.1">
                <span class="greetings" style="font-size: 1.25rem">
                    Good morning,
                </span>

                <span class="font-bold text-5xl" style="font-size: 2rem; font-weight: 700; ">
                    {{ Auth::user()->name }}
                </span>
            </div>

            <div class="profile-photo" style="align-self: center;">
                <img src="{{ asset(Auth::user()->photo) }}" alt="profile" class="h-10 w-10 rounded-full mr-2" style="border-radius: 50%;">
            </div>
        </div>
    </div>

</nav>
