<template>
    <component :is="props.href ? Link : 'span'" :href="props.href"
        class="flex items-center uppercase text-gray-500 cursor-pointer  hover:text-blue-500">
        <CalendarDaysIcon class="h-5 mr-2" />
        <slot />
    </component>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { CalendarDaysIcon } from '@heroicons/vue/24/outline';

let props = defineProps({
    href: String
})
</script>
