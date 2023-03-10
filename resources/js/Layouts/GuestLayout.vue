<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex flex-col items-center mt-24 bg-gray-100 sm:justify-center sm:pt-0">
        <div>
            <Link href="/">
            </Link>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden border-4 bg-white border-rose-500  sm:max-w-md sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
