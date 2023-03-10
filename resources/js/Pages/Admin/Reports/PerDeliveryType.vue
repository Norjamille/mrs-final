<template>
  <AdminLayout title="Per Purok">
    <div class="flex justify-end mb-5">
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="pritable">
      <ReportHeader report-title=" Per Delivery Type" />
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Type</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Count</th>
        </tr>
        <tr v-for="(typedata, index) in props.data" :key="index">
          <td style="border: 1px solid #000000; padding: 0.9375rem;">
            {{ typedata.label }}
          </td>
          <td style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">
            {{ typedata.value }}
          </td>
        </tr>
      </table>
    </div>
  </AdminLayout>
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { onMounted } from 'vue';
import ReportHeader from "@/Components/ReportHeader.vue"
const props = defineProps({
  data: Object,
})

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

