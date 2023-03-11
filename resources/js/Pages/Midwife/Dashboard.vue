<script setup>
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import Svg from "@/images/Frame.svg"

import {
    ClipboardDocumentListIcon
} from "@heroicons/vue/24/outline"

const props = defineProps({
    total_patients: Number,
    total_infants: Number,
    total_users: Number,
})

</script>

<template>
    <MidwifeLayout title="Dashboard">
        <div class="grid space-y-5">
            <div class="relative grid w-full p-4 bg-white border rounded-2xl">
                <h1>
                    Hello 👋, <span class="text-xl font-bold">{{ $page.props.auth.user.name }}</span>
                </h1>
                <span class="text-2xl font-bold uppercase text-rose-500">
                    Maternal Recording System
                </span>
                <span class="text-gray-600">
                    Barangay Biwang, Bagumbayan Sultan Kudarat Philippines
                </span>
                <div class="absolute -top-7 right-3">
                    <img :src="Svg" class="h-44" alt="">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div class="flex items-start p-4 bg-white border shadow-sm rounded-xl">
                        <div
                            class="flex items-center justify-center w-12 h-12 border rounded-full border-rose-100 bg-rose-50">
                            <ClipboardDocumentListIcon class="w-6 h-6 text-rose-400" />
                        </div>
                        <div class="ml-4">
                            <h2 class="font-semibold">
                                {{ props.total_patients }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-500">Total Patient</p>
                        </div>
                    </div>
                    <div class="flex items-start p-4 bg-white border shadow-sm rounded-xl">
                        <div
                            class="flex items-center justify-center w-12 h-12 border rounded-full border-rose-100 bg-rose-50">
                            <ClipboardDocumentListIcon class="w-6 h-6 text-rose-400" />
                        </div>
                        <div class="ml-4">
                            <h2 class="font-semibold">
                                {{ props.total_infants }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-500">Total Infants</p>
                        </div>
                    </div>
                    <div class="flex items-start p-4 bg-white border shadow-sm rounded-xl">
                        <div
                            class="flex items-center justify-center w-12 h-12 border rounded-full border-rose-100 bg-rose-50">
                            <ClipboardDocumentListIcon class="w-6 h-6 text-rose-400" />
                        </div>
                        <div class="ml-4">
                            <h2 class="font-semibold">
                                {{ props.total_users }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-500">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MidwifeLayout>
</template>