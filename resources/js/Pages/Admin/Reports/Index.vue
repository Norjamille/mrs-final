<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

</script>
<template>
    <AdminLayout title="Reports">
        <div>
            <div
                class="overflow-hidden bg-gray-200 divide-y divide-gray-200 rounded-lg shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
                <div
                    class="relative p-6 bg-white rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                    <div class="mt-8">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                            <Link :href="route('admin.reports.perPurok')" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Per Purok
                            </Link>
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Generate reports for all pregnant patient in every purok of Biwang
                        </p>
                    </div>
                    <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                        aria-hidden="true">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                        </svg>
                    </span>
                </div>

                <div
                    class="relative p-6 bg-white sm:rounded-tr-lg group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">

                    <div class="mt-8">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                            <Link :href="route('admin.reports.perGender')" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Per Gender
                            </Link>
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Generate reports for all list of infants per gender
                        </p>
                    </div>
                    <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                        aria-hidden="true">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                        </svg>
                    </span>
                </div>

                <div
                    class="relative p-6 bg-white group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">

                    <div class="mt-8">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                            <Link :href="route('admin.reports.perDeliveryType')" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Per Delivery Type
                            </Link>
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Generate reports for number of all patient undetake a specific delivery type
                        </p>
                    </div>
                    <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                        aria-hidden="true">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                        </svg>
                    </span>
                </div>

                <div
                    class="relative p-6 bg-white group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">

                    <div class="mt-8">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                            <Link :href="route('admin.reports.listOfPregnant')" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            List of Pregnant
                            </Link>
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Generate reports for list of all pregnant woman
                        </p>
                    </div>
                    <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                        aria-hidden="true">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                        </svg>
                    </span>
                </div>

                <div
                    class="relative p-6 bg-white sm:rounded-bl-lg group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">

                    <div class="mt-8">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                            <Link :href="route('admin.reports.listOfInfants')" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            List of Infants
                            </Link>
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Generate reports for list of all infants
                        </p>
                    </div>
                    <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                        aria-hidden="true">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

