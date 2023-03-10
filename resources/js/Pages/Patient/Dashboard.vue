<script setup>
import Table from '@/Components/Table.vue';
import Tcell from '@/Components/Tcell.vue';
import logo from "@/images/logo.png"
import PatientLayout from '@/Layouts/PatientLayout.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
const props = defineProps({
  check_ups: Object,
  patient: Object
})
</script>
<template>
  <PatientLayout title="Dashboard">
    <div class="sm:flex sm:space-x-4 grid space-y-4">
      <div class="w-full">
        <div class="mb-4 px-4">
          <PrimaryButtonLink href="/patient/about/pregnancy">
            View More About Pregnancy Information
          </PrimaryButtonLink>
        </div>
        <div class="overflow-hidden sm:px-0 px-4 bg-white shadow sm:rounded-md">
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
      <div class="sm:w-[300px] sm:px-0 px-5">
        <div>
          <div class="py-3 bg-white rounded-lg shadow-xl">
            <div class="p-2 photo-wrapper">
              <img class="w-20 h-20 mx-auto border-4 rounded-full border-rose-500" :src="logo" alt="John Doe">
            </div>
            <div class="p-2">
              <h3 class="text-xl font-medium leading-8 text-center text-gray-900">
                {{ $page.props.auth.user.name }}
              </h3>
              <table class="my-3 text-xs">
                <tbody>
                  <tr>
                    <td class="px-2 py-2 font-semibold text-gray-500">Address</td>
                    <td class="px-2 py-2">
                      {{ patient.address }}
                    </td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold text-gray-500">Phone</td>
                    <td class="px-2 py-2">
                      {{ patient.contact_number }}
                    </td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold text-gray-500">Email</td>
                    <td class="px-2 py-2">
                      {{ patient.email }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </PatientLayout>
</template>



