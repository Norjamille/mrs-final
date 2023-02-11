<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { ref } from 'vue';
let props = defineProps({
    puroks: Object,
    patient: Object
})

let confirmDelete = ref(false);

let form = useForm({
    id: props.patient.id,
    first_name: props.patient.first_name,
    middle_name: props.patient.middle_name,
    last_name: props.patient.last_name,
    address: props.patient.address,
    middle_name: props.patient.middle_name,
    purok_id: props.patient.purok_id,
    email: props.patient.email,
    contact_number: props.patient.contact_number,
    contact_number: props.patient.contact_number,
    date_of_birth: props.patient.date_of_birth,
})

const submitHandler = () => {
    form.patch(route('midwife.patients.update', { patient: props.patient.id }));
}

const deleteHandler = () => {
    router.delete(route('midwife.patients.delete', { patient: props.patient.id }))
}
</script>

<template>
    <MidwifeLayout title="Edit Patient">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.first_name" :error="form.errors.first_name" type="text"
                            label="First Name" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.middle_name" :error="form.errors.middle_name" type="text"
                            label="Middle Name" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.last_name" :error="form.errors.last_name" type="text"
                            label="Last Name" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.address" :error="form.errors.address" type="text" label="Address" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormSelect v-model="form.purok_id" :error="form.errors.purok_id" label="Purok">
                            <option value="" hidden></option>
                            <option v-for="purok in puroks" :key="purok.id" :value="purok.id">
                                {{ purok.name }}
                            </option>
                        </FormSelect>
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.email" :error="form.errors.email" label="Email" type="email" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.contact_number" :error="form.errors.contact_number"
                            label="Contact Number" type="number" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.date_of_birth" :error="form.errors.date_of_birth" label="Date of Birth"
                            type="date" />
                    </div>
                    <template #footer>
                        <div class="flex space-x-3">
                            <PrimaryButton>Save Update</PrimaryButton>
                        </div>
                    </template>
                </Card>
            </form>
        </div>
        <div class="bg-red-100 border border-red-300 flex flex-col gap-2 p-3 rounded-xl mt-5">
            <span class="text-red-500">
                Delete patient record including Personal Data, Pregnancy History, Schedules and Account
            </span>
            <div v-if="confirmDelete" class="flex space-x-3">
                <SecondaryButton @click="confirmDelete = false">
                    Cancel
                </SecondaryButton>
                <PrimaryButton @click="deleteHandler">
                    Confirm Delete
                </PrimaryButton>
            </div>
            <div v-else>
                <SecondaryButton @click="confirmDelete = true">
                    Delete
                </SecondaryButton>
            </div>
        </div>
    </MidwifeLayout>
</template>