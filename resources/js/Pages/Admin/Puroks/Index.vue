<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import EmptyTable from '@/Components/EmptyTable.vue';
import Pagination from '@/Components/Pagination.vue';
import Table from '@/Components/Table.vue';
import Tcell from '@/Components/Tcell.vue';
import TableButton from '@/Components/TableButton.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
import { reactive, watch } from 'vue';
import debounce from 'lodash/debounce';
import { router } from '@inertiajs/core';

import {
    PencilSquareIcon,
    TrashIcon
} from '@heroicons/vue/24/outline';

const props = defineProps({
    puroks: Object,
    filters: Object
})

const filters = reactive({
    search: props.filters.search,
})

watch(filters, debounce(function (value) {
    router.get(route('admin.puroks'), {
        search: value.search,
    }, {
        preserveScroll: true,
        replace: true,
    })
}, 500))

</script>
<template>
    <AdminLayout title="Puroks">
        <div class="grid gap-4">
            <div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3 divide-x-2">
                        <TextInput v-model="filters.search" type="search" placeholder="Search..." />
                    </div>
                    <div class="flex space-x-3">
                        <PrimaryButtonLink :href="route('admin.puroks.create')">Create Purok</PrimaryButtonLink>
                    </div>
                </div>
            </div>
            <Table :headers="['Name', 'Actions']">
                <tr v-for="purok in props.puroks.data" :key="purok.id">
                    <Tcell>{{ purok.name }} </Tcell>
                    <Tcell>
                        <div class="flex items-center space-x-2">
                            <TableButton :href="route('admin.puroks.edit', { purok: purok.id })">
                                <PencilSquareIcon class="h-5 mr-2" />
                                Edit
                            </TableButton>
                        </div>
                    </Tcell>
                </tr>
                <EmptyTable v-if="props.puroks.data.length == 0" colspan="2" />
                <template #footer>
                    <Pagination :prev-url="puroks.prev_page_url" :next-url="puroks.next_page_url" :from="puroks.from"
                        :to="puroks.to" :total="puroks.total" />
                </template>
            </Table>
        </div>
    </AdminLayout>
</template>

