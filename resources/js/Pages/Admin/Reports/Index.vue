<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/vue3';

const tabs = [
    {
        title: 'Per Purok',
        description: 'Generate reports for all pregnant patient in every purok of Biwang',
        route: '/per-purok/reports'
    },
    {
        title: 'Per Gender',
        description: 'Generate reports for all list of infants per gender',
        route: '/per-gender/report'
    },
    {
        title: 'Per Delivery Type',
        description: 'Generate reports for number of all patient undetake a specific delivery type',
        route: '/per-delivery-type/reports'
    },
    {
        title: ' List of Pregnant',
        description: ' Generate reports for list of all pregnant woman',
        route: route('admin.reports.listOfPregnant')
    },
    {
        title: 'List of Infants',
        description: '  Generate reports for list of all infants',
        route: route('admin.reports.listOfInfants')
    },
    {
        title: 'List of Schedules',
        description: 'Generate reports for list of all schedules',
        route: route('admin.reports.listOfSchedules')
    },
    {
        title: 'Number of Vaccinated Infants',
        description: 'Generate reports for number of maccinated infants',
        route: '/vaccinated/reports'
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
                    <Link :href="tab.route" class="px-3 py-1.5 text-white text-sm bg-rose-600 rounded-md">
                    Print
                    </Link>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

