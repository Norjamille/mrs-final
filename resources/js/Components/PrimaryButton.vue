<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    loadingOn: {
        type: Boolean,
        required: false
    },
});
</script>

<template>
    <button :type="type" :class="{
        'cursor-progress': loadingOn
    }"
        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition border border-transparent rounded-md bg-rose-500 hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:border-rose-900 focus:ring focus:ring-rose-300 disabled:opacity-25">
        <svg v-if="loadingOn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="h-4 mr-2 fill-white animate-spin">
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z" />
        </svg>
        <slot />
    </button>
</template>
