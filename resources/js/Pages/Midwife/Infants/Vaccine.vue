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
  infant: Object,
  vaccinations: Object,
  filters: Object,
})
</script>

<template>
  <MidwifeLayout title="Infants">
    <div class="grid gap-4">
      <div>
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3 divide-x-2">
          </div>
        </div>
      </div>
      <Table :headers="['Vaccine', 'Date', 'Months After Birth']">
        <tr v-for="vaccine in props.vaccinations" :key="vaccine.id">
          <Tcell>{{ vaccine.vaccine }} </Tcell>
          <Tcell>{{ vaccine.date_at }} </Tcell>
          <Tcell>{{ vaccine.months_after_birth }} </Tcell>
        </tr>
        <EmptyTable v-if="props.vaccinations.length == 0" colspan="3" />
      </Table>
    </div>
  </MidwifeLayout>
</template>