<script setup>
import Table from '@/Components/Table.vue';
import Tcell from '@/Components/Tcell.vue';

import PatientLayout from '@/Layouts/PatientLayout.vue';

const props = defineProps({
  check_ups: Object,
})
</script>
<template>
  <PatientLayout title="Dashboard">
    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow sm:rounded-md">
        <Table :headers="['Date', 'Status']">
          <tr v-for="check_up in props.check_ups" :key="check_up.id">
            <Tcell>{{ check_up.formated_date_at }}</Tcell>
            <Tcell>
              <span class="px-3 py-1 rounded-full" :class="{
                'text-yellow-100 bg-yellow-600': !check_up.done_at,
                'text-green-100  bg-green-600': check_up.done_at,
              }" v-text="check_up.done_at ? 'Done' : 'Upcoming...'"></span>
            </Tcell>
          </tr>
        </Table>
      </div>
    </div>
  </PatientLayout>
</template>



