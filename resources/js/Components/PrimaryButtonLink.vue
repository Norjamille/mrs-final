<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <Link :type="type"
        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition border border-transparent rounded-md bg-rose-500 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring focus:ring-rose-300 disabled:opacity-25">
    <slot />
    </Link>
</template>
