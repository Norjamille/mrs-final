<script setup>
import { Link } from '@inertiajs/vue3';
import logo from "@/images/logo.png"
import {
    HomeIcon,
    ClipboardDocumentListIcon,
    CalendarDaysIcon,
    UsersIcon,
    PresentationChartBarIcon,
    UserIcon,
    CogIcon
} from '@heroicons/vue/24/outline';

const navigations = [
    {
        name: 'Dashboard',
        url: '/midwife/dashboard',
        icon: HomeIcon,
    },
    {
        name: 'Patients',
        url: '/midwife/patients',
        icon: ClipboardDocumentListIcon,
    },
    {
        name: 'Schedules',
        url: '/midwife/schedules',
        icon: CalendarDaysIcon,
    },
    {
        name: 'Infants',
        url: '/midwife/infants',
        icon: UsersIcon,
    },
    {
        name: 'Reports',
        url: '/midwife/reports',
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
        <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-rose-600">
            <div class="flex items-center flex-shrink-0 px-4 space-x-4">
                <div class="p-3 bg-white rounded-full">
                    <img class="w-auto h-8" :src="logo" alt="Your Company">
                </div>
                <span class="text-xl font-bold tracking-widest text-white">M.R.S</span>
            </div>
            <div class="flex flex-col flex-1 mt-5">
                <nav class="flex-1 px-2 pb-4 space-y-2">
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



