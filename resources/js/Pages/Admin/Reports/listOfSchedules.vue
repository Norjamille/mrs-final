<template>
  <AdminLayout title="Per Purok">
    <div class="flex justify-end mb-5 space-x-2">
      <SelectInput v-model="scope">
        <option value="">All</option>
        <option value="upcoming">Upcoming</option>
        <option value="done">Done</option>
      </SelectInput>
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="pritable">
      <ReportHeader :report-title="scopeTitle" />
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Patient Name</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Date</th>
        </tr>
        <tr v-for="schedule in props.schedules" :key="schedule.id">
          <td style="border: 1px solid #000000; padding: 0.9375rem;">
            {{ schedule.patient }}
          </td>
          <td style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">
            {{ schedule.date }}
          </td>
        </tr>
      </table>
    </div>
  </AdminLayout>
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref, computed, watch } from 'vue';
import ReportHeader from "@/Components/ReportHeader.vue"
import debounce from 'lodash/debounce';
import { router } from '@inertiajs/core';

const props = defineProps({
  schedules: Object,
  filters: Object
})

let scope = ref(props.filters.scope || null)

let scopeTitle = computed(() => {
  if (scope.value == 'upcoming') {
    return 'List of all upcoming check-up schedule'
  } else if (scope.value == 'done') {
    return 'List of all done check-up schedule'
  } else {
    return 'List of all schedule'
  }
})

watch(scope, debounce((value) => {
  router.get(route('admin.reports.listOfSchedules'), { scope: value }, {
    preserveScroll: true,
    replace: true
  })
}))

function printContent() {
  const printableContent = document.getElementById('pritable').innerHTML;
  const printWindow = window.open('', '', 'height=1000,width=1000');
  printWindow.document.write('<html><head>');
  printWindow.document.write("<title>Per Purok Report - " + new Date().toLocaleDateString() + "</title>");
  printWindow.document.write('<link rel="stylesheet" href="/resources/css/app.css">');
  printWindow.document.write('</head><body>');
  printWindow.document.write('</title></head><body>');

  printWindow.document.write(printableContent);
  printWindow.document.write('</body></html>');
  printWindow.document.close();
  printWindow.print();
}

</script>

