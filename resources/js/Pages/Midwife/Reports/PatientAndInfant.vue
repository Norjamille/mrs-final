<template>
  <MidwifeLayout title="Patient And Infant Report">
    <div class="flex justify-end mb-5">
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="pritable">
      <ReportHeader report-title="Patient Information Report" />
      <div style="padding-top: 10px; display: grid;">
        <span class="text-xl text-gray-600">Patient Name : {{ props.patient.first_name }} {{ props.patient.last_name
        }}</span>
        <span class="text-xl text-gray-600">Address : {{ props.patient.address }} </span>
        <span class="text-xl text-gray-600">Purok : {{ props.patient.purok.name }} </span>
        <span class="text-xl text-gray-600">Contact Number : {{ props.patient.contact_number }} </span>
        <span class="text-xl text-gray-600">Email : {{ props.patient.email }} </span>

      </div>
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Infant Name</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Delivery Date</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Delivery Type</th>
        </tr>
        <template v-for="pregnancy in props.pregnancies" :key="'preg-'+pregnancy.id">
          <tr v-for="infant in pregnancy.infants" :key="'inf' + infant.id">
            <td style="border: 1px solid #000000; padding: 0.9375rem;">
              {{ infant.first_name }} {{ infant.last_name }}
            </td>
            <td style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">
              {{ pregnancy.delivery_date }}
            </td>
            <td style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">
              {{ props.types[pregnancy.delivery_type] }}
            </td>
          </tr>
        </template>
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
  patient: Object,
  pregnancies: Object,
  types: Array,
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

