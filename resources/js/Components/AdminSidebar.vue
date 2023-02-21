<script setup>
import { Link } from '@inertiajs/vue3';
import {
    HomeIcon,
    PresentationChartBarIcon,
    UserIcon,
    BuildingStorefrontIcon,
    CogIcon
} from '@heroicons/vue/24/outline';

const navigations = [
    {
        name: 'Dashboard',
        url: '/admin/dashboard',
        icon: HomeIcon,
    },
    {
        name: 'Users',
        url: '/admin/users',
        icon: UserIcon,
    },
    {
        name: 'Puroks',
        url: '/admin/puroks',
        icon: BuildingStorefrontIcon,
    },
    {
        name: 'Reports',
        url: '/admin/reports',
        icon: PresentationChartBarIcon,
    },
    {
        name: 'Account Setting',
        url: '/account',
        icon: CogIcon
    }
]
</script>
<template>
    <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-rose-600">
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=rose&shade=300"
                    alt="Your Company">
            </div>
            <div class="flex flex-col flex-1 mt-5">
                <nav class="flex-1 px-2 pb-4 space-y-2">
                    <!-- Current: "bg-rose-800 text-white", Default: "text-rose-100 hover:bg-rose-600" -->
                    <!-- <a href="#"
                                    class="flex items-center px-2 py-2 text-sm font-medium text-white rounded-md bg-rose-700 group">
                                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-rose-300" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    Dashboard
                                </a> -->
                    <Link :href="nav.url" v-for="(nav, index) in navigations" :key="index" :class="{
                        'hover:bg-rose-600 text-rose-300': !$page.url.startsWith(nav.url),
                        'bg-rose-700 text-rose-100': $page.url.startsWith(nav.url),
                    }" class="flex items-center px-2 py-2 text-sm font-medium tracking-wide rounded-md group">
                    <component :is="nav.icon" class="flex-shrink-0 w-6 h-6 mr-3 "></component>
                    {{ nav.name }}
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>



