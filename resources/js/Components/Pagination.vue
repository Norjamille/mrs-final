<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    prevUrl: {
        type: String,
        required: false,
    },
    nextUrl: {
        type: String,
        required: false,
    },
    from: Number,
    to: Number,
    total: Number
})
</script>

<template>
    <nav class="flex items-center justify-between py-3 " aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">
                    {{ props.from }}
                </span>
                to
                <span class="font-medium">
                    {{ props.to }}
                </span>
                of
                <span class="font-medium">
                    {{ props.total }}
                </span>
                results
            </p>
        </div>
        <div class="flex justify-between flex-1 sm:justify-end">
            <component :is="prevUrl ? Link : 'span'" :href="prevUrl" :class="{
                ' bg-white hover:bg-gray-50': prevUrl,
                ' bg-gray-100': !prevUrl
            }"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md ">
                Previous</component>
            <component :is="nextUrl ? Link : 'span'" :href="nextUrl" :class="{
                ' bg-white hover:bg-gray-50': nextUrl,
                ' bg-gray-100': !nextUrl
            }"
                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 border border-gray-300 rounded-md ">
                Next</component>
        </div>
    </nav>
</template>