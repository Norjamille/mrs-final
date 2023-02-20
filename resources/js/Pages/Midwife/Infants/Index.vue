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
import { PencilSquareIcon } from '@heroicons/vue/24/outline'
import debounce from 'lodash/debounce'
import { router } from '@inertiajs/core';

import { reactive, watch } from "vue"

let filters = reactive({
    search: props.filters.search,
    status: props.filters.status,
})

watch(filters, debounce(function (value) {
    router.get(route('midwife.infants'), {
        search: value.search,
        status: value.status,
    }, {
        preserveScroll: true,
        replace: true
    })
}, 500))

const props = defineProps({
    infants: Object,
    filters: Object,
})
</script>

<template>
    <MidwifeLayout title="Infants">
        <div class="grid gap-4">
            <div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3 divide-x-2">
                        <TextInput v-model="filters.search" type="search" placeholder="Search..." />
                    </div>
                </div>
            </div>
            <Table :headers="['Full Name', 'Gender', 'Date Of Birth', 'Actions']">
                <tr v-for="infant in props.infants.data" :key="infant.id">
                    <Tcell>{{ infant.full_name }} </Tcell>
                    <Tcell>{{ infant.gender }} </Tcell>
                    <Tcell>{{ infant.date_of_birth }} </Tcell>
                    <Tcell>
                        <TableButton :href="route('midwife.patients.infant.edit', { infant: infant.id })">
                            <PencilSquareIcon class="h-5 mr-2" />
                            Edit
                        </TableButton>
                    </Tcell>
                </tr>
                <EmptyTable v-if="props.infants.data.length == 0" colspan="4" />
                <template #footer>
                    <Pagination :prev-url="infants.prev_page_url" :next-url="infants.next_page_url" :from="infants.from"
                        :to="infants.to" :total="infants.total" />
                </template>
            </Table>
        </div>
    </MidwifeLayout>
</template>