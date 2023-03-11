<template>
  <MidwifeLayout title="Per Purok">
    <div class="flex justify-end mb-5">
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="pritable">
      <ReportHeader report-title="List of Infants" />
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Name</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Gender</th>
        </tr>
        <tr v-for="(infant, index) in props.infants" :key="infant.id">
          <td style="border: 1px solid #000000; padding: 0.9375rem;">
            {{ infant.first_name }} {{ infant.last_name }}
          </td>
          <td style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">
            {{ infant.gender }}
          </td>
        </tr>
      </table>
    </div>
  </MidwifeLayout>
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { onMounted } from 'vue';
import ReportHeader from "@/Components/ReportHeader.vue"

const props = defineProps({
  infants: Object,
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

