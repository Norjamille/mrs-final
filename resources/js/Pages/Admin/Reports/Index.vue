<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

const tabs = [
    {
        title: 'Per Purok',
        description: 'Generate reports for all pregnant patient in every purok of Biwang',
        route: '/per-purok/reports',
        useLink: false
    },
    {
        title: 'Per Gender',
        description: 'Generate reports for all list of infants per gender',
        route: '/per-gender/report',
        useLink: false

    },
    {
        title: 'Per Delivery Type',
        description: 'Generate reports for number of all patient undetake a specific delivery type',
        route: '/per-delivery-type/reports',
        useLink: false
    },
    {
        title: ' List of Pregnant',
        description: ' Generate reports for list of all pregnant woman',
        route: route('admin.reports.listOfPregnant'),
        useLink: true
    },
    {
        title: 'List of Infants',
        description: '  Generate reports for list of all infants',
        route: route('admin.reports.listOfInfants'),
        useLink: true
    },
    {
        title: 'List of Schedules',
        description: 'Generate reports for list of all schedules',
        route: route('admin.reports.listOfSchedules'),
        useLink: true
    },
    {
        title: 'Number of Vaccinated Infants',
        description: 'Generate reports for number of maccinated infants',
        route: '/vaccinated/reports',
        useLink: true
    }
]
</script>
<template>
    <AdminLayout title="Reports">
        <div class="grid grid-cols-4 gap-4">
            <div v-for="(tab, index) in tabs" :key="index" class="p-3 bg-white border rounded-xl ">
                <h1 class="font-semibold text-rose-500">
                    {{ tab.title }}
                </h1>
                <p class="text-sm text-gray-600">
                    {{ tab.description }}
                </p>
                <div class="pt-4">
                    <template v-if="tab.useLink">
                        <Link :href="tab.route" class="px-3 py-1.5 text-white text-sm bg-rose-600 rounded-md">
                        Print {{ tab.useLink }}
                        </Link>
                    </template>
                    <template v-else>
                        <a :href="tab.route" target="_blank" class="px-3 py-1.5 text-white text-sm bg-rose-600 rounded-md">
                            Print {{ tab.useLink }}
                        </a>
                    </template>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

