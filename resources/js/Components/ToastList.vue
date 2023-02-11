<script setup>
import ToastListItem from "@/Components/ToastListItem.vue";
import { onUnmounted, ref } from "vue";
import { router } from "@inertiajs/core";
import { usePage } from "@inertiajs/vue3";
import toast from "@/Composables/useToast"

const page = usePage();

let removeFinshEventListener = router.on("finish", () => {
    if (page.props.toast) {
        toast.add({
            type: page.props.toast.type,
            message: page.props.toast.message,
        });
    }
});

onUnmounted(() => removeFinshEventListener());

function remove(index) {
    toast.remove(index);
}
</script>
<template>
    <TransitionGroup tag="div" enter-from-class="translate-x-full opacity-0" enter-active-class="duration-500"
        leave-active-class="duration-500" leave-to-class="translate-x-full opacity-0"
        class="fixed z-50 w-full max-w-xs space-y-4 top-4 right-4">
        <ToastListItem v-for="(item, index) in toast.items" :key="item.key" :message="item.message" :type="item.type"
            :duration="3000" @remove="remove(index)" />
    </TransitionGroup>
</template>