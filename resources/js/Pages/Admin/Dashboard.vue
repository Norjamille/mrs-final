<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Svg from "@/images/Frame.svg"
</script>
<template>
    <AdminLayout title="Dashboard">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-rose-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="font-semibold">100</h2>
                            <p class="mt-2 text-sm text-gray-500">Total Patient</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>


<script>


</script>
