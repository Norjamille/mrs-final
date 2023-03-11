<script setup>
import MidwifeSidebar from '@/Components/MidwifeSidebar.vue';
import UserDropdown from '@/Components/Shared/UserDropdown.vue';
import ToastList from '@/Components/ToastList.vue';
import { Head } from '@inertiajs/vue3';
let props = defineProps({
    title: String
})
</script>

<template>
    <Head>
    <title>
        {{ props.title }} | MRS
    </title>
</Head>
<div>
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
            <!--
                                                      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

                                                      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

        <div class="fixed inset-0 z-40 flex">
                <!--
                                                        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
            <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-rose-700">
                    <!--
                                                          Close button, show/hide based on off-canvas menu state.

                                                          Entering: "ease-in-out duration-300"
                                                            From: "opacity-0"
                                                            To: "opacity-100"
                                                          Leaving: "ease-in-out duration-300"
                                                            From: "opacity-100"
                                                            To: "opacity-0"
                                                        -->
                    <div class="absolute top-0 right-0 pt-2 -mr-12">
                        <button type="button"
                            class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center flex-shrink-0 px-4">
                        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=rose&shade=300"
                            alt="Your Company">
                    </div>
                    <div class="flex-1 h-0 mt-5 overflow-y-auto">
                        <nav class="px-2 space-y-1">
                            <!-- Current: "bg-rose-800 text-white", Default: "text-rose-100 hover:bg-rose-600" -->
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md bg-rose-800 group">
                                <!-- Heroicon name: outline/home -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Dashboard
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-rose-100 hover:bg-rose-600 group">
                                <!-- Heroicon name: outline/users -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                Team
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-rose-100 hover:bg-rose-600 group">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                </svg>
                                Projects
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-rose-100 hover:bg-rose-600 group">
                                <!-- Heroicon name: outline/calendar -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                                Calendar
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-rose-100 hover:bg-rose-600 group">
                                <!-- Heroicon name: outline/inbox -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                </svg>
                                Documents
                            </a>

                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium rounded-md text-rose-100 hover:bg-rose-600 group">
                                <!-- Heroicon name: outline/chart-bar -->
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                </svg>
                                Reports
                            </a>
                        </nav>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <MidwifeSidebar />
        <div class="flex flex-col flex-1 md:pl-64">
            <div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white shadow">
                <button type="button"
                    class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/bars-3-bottom-left -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                </button>
                <div class="flex justify-between flex-1 px-4">
                    <div class="flex items-center flex-1">
                        <span class="text-xl font-semibold uppercase text-rose-500">
                            Maternal Recording System
                        </span>
                    </div>
                    <div class="flex items-center ml-4 md:ml-6">
                        <UserDropdown />
                        <span class="ml-3 text-gray-600">
                            {{ $page.props.auth.user.name }}
                        </span>
                    </div>
                </div>
            </div>

            <main>
                <div class="py-6">
                    <div class="mx-auto max-w-[1500px] px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            {{ props.title }}
                        </h1>
                    </div>
                    <div class="mx-auto mt-3 max-w-[1500px] px-4 sm:px-6 md:px-8">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
        <ToastList />
    </div>
</template>



