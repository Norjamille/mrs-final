<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue', 'disabled', 'type', 'label', 'error']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

</script>

<template>
    <div v-auto-animate>
        <label v-if="label" class="text-gray-700">
            {{ label }}
        </label>
        <div class="mt-1">
            <input :type="type" :disabled="disabled"
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50"
                :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input" />
        </div>
        <span v-if="error" class="mt-1 text-red-500">
            {{ error }}
        </span>
    </div>
</template>
