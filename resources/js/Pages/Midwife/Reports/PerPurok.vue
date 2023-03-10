<template>
  <MidwifeLayout title="Per Purok">
    <div class="flex justify-end mb-5">
      <PrimaryButton @click="printContent">Print</PrimaryButton>
    </div>
    <div id="printable">
      <ReportHeader report-title="  Per Gender" />
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
      <!-- <div class="pt-5">
        <Pie :data="data" :options="options" />
      </div> -->
    </div>
  </MidwifeLayout>
</template>

<!-- <script >
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Pie } from 'vue-chartjs'

ChartJS.register(ArcElement, Tooltip, Legend)
const data = {
  labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
  datasets: [
    {
      backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
      data: [40, 20, 80, 10]
    }
  ]
}
const options = {
  responsive: true,
  maintainAspectRatio: false
}
export default {
  name: 'App',
  components: {
    Pie
  },
  data() {
    return {
      data,
      options
    }
  }
}
</script> -->

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { onMounted, ref } from 'vue';
import ReportHeader from "@/Components/ReportHeader.vue"
const props = defineProps({
  puroks: Object,
})

function printContent() {
  var printContents = document.getElementById('printable').innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;

  // const printableContent = document.getElementById('pritable').innerHTML;
  // const printWindow = window.open('', '', 'height=1000,width=1000');
  // printWindow.document.write('<html><head>');
  // printWindow.document.write("<title>Per Purok Report - " + new Date().toLocaleDateString() + "</title>");
  // printWindow.document.write('<link rel="stylesheet" href="/resources/css/app.css">');
  // printWindow.document.write('</head><body>');
  // printWindow.document.write('</title></head><body>');

  // setTimeout(() => {
  //   printWindow.document.write(printableContent);
  //   printWindow.document.write('</body></html>');
  //   printWindow.document.close();
  //   printWindow.print();
  // }, 1000);
}

</script>

