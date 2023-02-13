<script setup>
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import Table from '@/Components/Table.vue';
import Tcell from '@/Components/Tcell.vue';
import EmptyTable from '@/Components/EmptyTable.vue';
import Pagination from '@/Components/Pagination.vue';
import TableButton from '@/Components/TableButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Filter from '@/Components/Filter.vue';
import SelectInput from '@/Components/SelectInput.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';


import { reactive } from 'vue';
import {
    ArrowRightIcon
} from '@heroicons/vue/24/solid'

let filters = reactive({
    search: props.filters.search,
    status: props.filters.status,
    date: props.filters.date
})

const props = defineProps({
    schedules: Object,
    filters: Object
})
</script>

<template>
    <MidwifeLayout title="Schedules">
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
                            <Filter name="Date">
                                <TextInput type="date" v-model="filters.date" />
                            </Filter>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <PrimaryButtonLink :href="route('midwife.patients.create')">Create New</PrimaryButtonLink>
                    </div>
                </div>
            </div>
            <Table :headers="['Patient Name', 'Check Up Date', 'Done', 'Actions']">
                <tr v-for="schedule in props.schedules.data" :key="schedule.id">
                    <Tcell>{{ schedule.patient_name }} </Tcell>
                    <Tcell>{{ schedule.date }} </Tcell>
                    <Tcell>
                        <span :class="{
                            'bg-green-100 text-green-500 border-green-400': schedule.is_done,
                            'bg-red-100 text-red-500 border-red-400': !schedule.is_done,
                        }" class="px-2 py-0.5 border rounded-full" v-text="schedule.is_done ? 'Yes' : 'No'">
                        </span>
                    </Tcell>
                    <Tcell>
                        <TableButton :href="route('midwife.schedules.edit', { checkup: schedule.id })">
                            <span v-text="schedule.is_done ? 'Edit' : 'Start Check Up'"> </span>
                            <ArrowRightIcon class="h-5 ml-2" />
                        </TableButton>
                    </Tcell>
                </tr>
                <EmptyTable v-if="props.schedules.data.length == 0" colspan="4" />
                <template #footer>
                    <Pagination :prev-url="schedules.prev_page_url" :next-url="schedules.next_page_url"
                        :from="schedules.from" :to="schedules.to" :total="schedules.total" />
                </template>
            </Table>
        </div>
    </MidwifeLayout>
</template>