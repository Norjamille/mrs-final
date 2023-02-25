<template>
  <AdminLayout title="Per Purok">
    <div class="flex justify-end mb-5">
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="pritable">
      <div style="text-align: center; font-size: 20pt; font-weight: bold;">Maternal Recording System in Barangay Biwang,
        Bagumbayan Sultan Kudarat</div>
      <p style="font-size: 1.25rem; font-weight: 600; text-align: center; margin-top: 20px;">
        Per Gender
      </p>
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">Purok</th>
          <th style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">No of Pregnancy</th>
        </tr>
        <tr v-for="purok in props.puroks" :key="purok.id">
          <td style="border: 1px solid #000000; padding: 0.9375rem;">
            {{ purok.name }}
          </td>
          <td style="border: 1px solid #000000; padding: 0.9375rem; text-align: center;">
            {{ purok.patients_count }}
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

const props = defineProps({
  puroks: Object,
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

