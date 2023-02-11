<template>
    <component :is="props.href ? Link : 'button'" :href="props.href" type="button"
        class="flex items-center uppercase text-gray-500 cursor-pointer  hover:text-rose-600 font-semibold">
        <slot name="icon" />
        <slot />
    </component>

</template>

<script setup>
import { Link } from '@inertiajs/vue3';

let props = defineProps({
    href: String
})
</script>
