<script setup>
let props = defineProps({
    name: String,
})
</script>

<template>
    <div class="flex space-x-3 items-center">
        <span>{{ props.name }}</span>
        <slot />
    </div>
</template>


