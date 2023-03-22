<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormTextarea from '@/Components/FormTextarea.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { useDateFormat } from '@vueuse/core'

const formatDate = (date) => {
    return useDateFormat(date, 'MMMM DD YYYY | HH:mm A').value
}

const props = defineProps({
    patient: Object,
})

let form = useForm({
    date_at: '',
    description: '',
})

const submitHandler = () => {
    form.post(route('midwife.pregnancy.check-up.schedules.store', { patient: props.patient.id }), {
        preserveState: true,
        onSuccess: () => {
            form.reset();
        }
    })
}
</script>

<template>
    <MidwifeLayout title="Create Check Up Schedule">
        <div class="gap-8 sm:grid sm:grid-cols-12">
            <div class="sm:col-span-8">
                <form @submit.prevent="submitHandler">
                    <Card>
                        <div class="sm:col-span-6">
                            <FormInput v-model="form.date_at" :error="form.errors.date_at" type="datetime-local"
                                label="Date" />
                        </div>
                        <div class="sm:col-span-6">
                            <FormTextarea v-model="form.description" :error="form.errors.description" label="Description" />
                        </div>
                        <template #footer>
                            <div class="flex space-x-3">
                                <SecondaryButtonLink :href="route('midwife.patients')">
                                    Return
                                </SecondaryButtonLink>
                                <b :loading-on="form.processing" :disabled="form.processing" type="submit">
                                    Submit</b>
                            </div>
                        </template>
                    </Card>
                </form>
            </div>
            <ol class="text-sm leading-6 divide-y divide-gray-100 sm:col-span-4">
                <div class="flex items-center justify-between space-x-2">
                    <h1 class="text-lg font-semibold">
                        Schedules
                    </h1>
                    <a :href="'/schedule-report/' + props.patient.id" target="_blank" type="button"
                        class="text-xl underline text-rose-600">
                        Print
                    </a>
                </div>
                <template v-for="schedule in props.patient.check_ups" :key="schedule.id">
                    <li class="relative flex py-4 space-x-6 xl:static">
                        <div class="flex-auto">
                            <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">
                                {{ schedule.description }}
                            </h3>
                            <dl class="flex flex-col mt-2 text-gray-500 xl:flex-row">
                                <div class="flex items-start space-x-3">
                                    <dt class="mt-0.5">
                                        <span class="sr-only">Date</span>
                                        <!-- Heroicon name: mini/calendar -->
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </dt>
                                    <dd><time :datetime="schedule.date_at">
                                            {{ formatDate(schedule.date_at) }}
                                        </time></dd>
                                </div>
                            </dl>
                        </div>
                    </li>
                </template>
            </ol>
        </div>
    </MidwifeLayout>
</template>