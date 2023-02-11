<script setup>
import EmptyTable from '@/Components/EmptyTable.vue';
import Filter from '@/Components/Filter.vue';
import Pagination from '@/Components/Pagination.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Table from '@/Components/Table.vue';
import Tcell from '@/Components/Tcell.vue';
import TextInput from '@/Components/TextInput.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { reactive, watch } from 'vue';
import debounce from 'lodash/debounce'
import { router } from '@inertiajs/core';
import TableButton from '@/Components/TableButton.vue';
import { CalendarDaysIcon, ClipboardDocumentListIcon, PencilSquareIcon } from '@heroicons/vue/24/outline';



const props = defineProps({
    patients: Object,
    filters: Object,
})

let filters = reactive({
    search: props.filters.search,
    status: props.filters.status,
    created: props.filters.created
})

watch(filters, debounce(function (value) {
    router.get(route('midwife.patients'), {
        search: value.search,
        status: value.status,
        created: value.created
    }, {
        preserveScroll: true,
        replace: true
    })
}, 500))
</script>

<template>
    <MidwifeLayout title="Patients">
        <div class="grid gap-4">
            <div>
                <div class="flex justify-between items-center">
                    <div class="flex space-x-3 items-center divide-x-2">
                        <TextInput v-model="filters.search" type="search" placeholder="Search..." />
                        <div class="flex pl-3 space-x-3">
                            <Filter name="Status">
                                <SelectInput v-model="filters.status">
                                    <option value="">All</option>
                                    <option value="pregnant">Pregnant</option>
                                </SelectInput>
                            </Filter>
                            <Filter name="Created">
                                <SelectInput v-model="filters.created">
                                    <option value="">Oldest</option>
                                    <option value="desc">Latest</option>
                                </SelectInput>
                            </Filter>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <PrimaryButtonLink :href="route('midwife.patients.create')">Create New</PrimaryButtonLink>
                    </div>
                </div>
            </div>
            <Table :headers="['Full Name', 'Age', 'Address', 'Contact number', 'Active', 'Actions']">
                <tr v-for="patient in props.patients.data" :key="patient.id">
                    <Tcell>{{ patient.full_name }} </Tcell>
                    <Tcell>{{ patient.age }} </Tcell>
                    <Tcell>{{ patient.address }} </Tcell>
                    <Tcell>{{ patient.contact_number }} </Tcell>
                    <Tcell>
                        <span :class="{
                            'bg-green-100 text-green-500 border-green-400': patient.is_pregnant,
                            'bg-red-100 text-red-500 border-red-400': !patient.is_pregnant,
                        }" class="px-2 py-0.5 border rounded-full" v-text="patient.is_pregnant ? 'Yes' : 'No'">
                        </span>
                    </Tcell>
                    <Tcell>
                        <div class="flex space-x-3 items-center">
                            <TableButton :href="route('midwife.patients.edit', { patient: patient.id })">
                                <PencilSquareIcon class="h-5 mr-2" />
                                Edit
                            </TableButton>
                            <span class="text-gray-200">|</span>
                            <TableButton :href="route('midwife.pregnancy.create', { patient: patient.id })">
                                <ClipboardDocumentListIcon class="h-5 mr-2" />
                                Pregnancy
                            </TableButton>
                            <span class="text-gray-200">|</span>
                            <TableButton
                                :href="route('midwife.pregnancy.check-up.schedules.create', { patient: patient.id })">
                                <CalendarDaysIcon class="h-5 mr-2" />
                                Schedules
                            </TableButton>
                        </div>
                    </Tcell>
                </tr>
                <EmptyTable v-if="props.patients.data.length == 0" colspan="6" />
                <template #footer>
                    <Pagination :prev-url="patients.prev_page_url" :next-url="patients.next_page_url"
                        :from="patients.from" :to="patients.to" :total="patients.total" />
                </template>
            </Table>
        </div>
    </MidwifeLayout>
</template>