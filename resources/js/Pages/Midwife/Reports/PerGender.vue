<template>
  <MidwifeLayout title="Per Gender">
    <div class="flex justify-end mb-5">
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="pritable">
      <ReportHeader report-title="Per Gender" />
      <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <tr style="background-color: #D9D9D9; height: 18.75pt;">
          <th style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">Gender</th>
          <th style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">No. of Infants</th>
        </tr>
        <tr>
          <td style="border: 1px solid #000000; padding: 3.75pt;">
            Male
          </td>
          <td style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">
            {{ props.male }}
          </td>
        </tr>
        <tr>
          <td style="border: 1px solid #000000; padding: 3.75pt;">
            Female
          </td>
          <td style="border: 1px solid #000000; padding: 3.75pt; text-align: center;">
            {{ props.female }}
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
  male: String,
  female: String
})


function printContent() {
  const printableContent = document.getElementById('pritable').innerHTML;
  const printWindow = window.open('', '', 'height=1000,width=1000');
  printWindow.document.title = `Per Purok Report - ${new Date().toLocaleDateString()}`;
  printWindow.document.write(printableContent);
  printWindow.document.write('</body></html>');
  printWindow.document.close();
  printWindow.print();
}

</script>

