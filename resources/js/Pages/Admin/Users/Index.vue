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


let filters = reactive({
    search: props.filters.search,
    role: props.filters.role,
})

const props = defineProps({
    users: Object,
    filters: Object
})

watch(filters, debounce(function (value) {
    router.get(route('admin.users'), {
        search: value.search,
        role: value.role,
    }, {
        preserveScroll: true,
        replace: true,
    })
}, 500))
</script>
<template>
    <AdminLayout title="Users">
        <div class="grid gap-4">
            <div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3 divide-x-2">
                        <TextInput v-model="filters.search" type="search" placeholder="Search..." />
                    </div>
                    <div class="flex space-x-3">
                        <PrimaryButtonLink :href="route('admin.users.create')">Create User</PrimaryButtonLink>
                    </div>
                </div>
            </div>
            <Table :headers="['User Name', 'Email', 'Role', 'Actions']">
                <tr v-for="user in props.users.data" :key="user.id">
                    <Tcell>{{ user.name }} </Tcell>
                    <Tcell>{{ user.email }} </Tcell>
                    <Tcell>
                        <span v-for="(role, index) in user.roles" :key="index" :class="{
                            'bg-gray-100 text-rose-600': role == 'Patient',
                            'bg-green-100 border-green-400 text-green-600': role == 'Admin',
                            'bg-rose-100 border-rose-400 text-rose-600': role == 'Midwife',
                        }" class="px-3 py-1 border rounded-full ">
                            {{ role }}
                        </span>
                    </Tcell>
                    <Tcell>
                        <div class="flex items-center space-x-2">
                            <TableButton :href="route('admin.users.edit', { user: user.id })">
                                <PencilSquareIcon class="h-5 mr-2" />
                                Edit
                            </TableButton>
                        </div>
                    </Tcell>
                </tr>
                <EmptyTable v-if="props.users.data.length == 0" colspan="4" />
                <template #footer>
                    <Pagination :prev-url="users.prev_page_url" :next-url="users.next_page_url" :from="users.from"
                        :to="users.to" :total="users.total" />
                </template>
            </Table>
        </div>
    </AdminLayout>
</template>

