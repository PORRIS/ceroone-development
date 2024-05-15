<template>
    <header class="z-10 py-4 bg-white shadow-md border-2 border-b-amber-500">
      <div class="container flex justify-between items-center px-6 mx-auto h-full text-purple-600 md:justify-end">
        <button @click="$page.props.showingMobileMenu = !$page.props.showingMobileMenu" class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" aria-label="Menu">
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" aria-label="Account" aria-haspopup="true">
         Ceroone
        </button>
      </div>
    </header>
</template>
