<script setup>
import { onMounted } from "vue";
import {
    CheckCircleIcon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'

const props = defineProps({
    type: String,
    message: String,
    duration: {
        type: Number,
        default: 3000
    }
});

onMounted(() => {
    setTimeout(() => emit("remove"), props.duration);
});

const emit = defineEmits(["remove"]);

</script>
<template>
    <div :class="{
        'border-green-500': props.type === 'success',
        'border-red-500': props.type === 'error'
    }" class="flex items-center p-4 text-gray-500 bg-white border-2 rounded-lg shadow " role="alert">
        <template v-if="props.type === 'success'">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                <CheckCircleIcon class="w-5 h-5" />
            </div>
        </template>
        <template v-else-if="props.type === 'error'">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
                <XMarkIcon class="w-5 h-5" />
            </div>
        </template>
        <template v-else>
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
                <XMarkIcon class="w-5 h-5" />
            </div>
        </template>
        <div class="ml-3 text-sm font-normal">{{ props.message }}</div>
        <button @click="emit('remove')" type="button"
            class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300    "
            data-dismiss-target="#toast-default" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</template>