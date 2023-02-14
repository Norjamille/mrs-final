<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import FormTextarea from '@/Components/FormTextarea.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { useForm } from '@inertiajs/vue3';

let props = defineProps({
    patient: Object,
    pregnancy: Object
})

let form = useForm({
    pregnancy_id: props.pregnancy.id,
    first_name: '',
    last_name: '',
    gender: '',
    date_of_birth: '',
    remarks: 'N/A',
    status: '',
});

const submitHandler = () => {
    form.post(route('midwife.patients.infant.store', { patient: props.patient.id }))
}
</script>

<template>
    <MidwifeLayout title="Record Infant">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.first_name" :error="form.errors.first_name" type="text"
                            label="First Name" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.last_name" :error="form.errors.last_name" type="text"
                            label="Last Name" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormSelect v-model="form.gender" :error="form.errors.gender" label="Gender">
                            <option value="" hidden></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </FormSelect>
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.date_of_birth" :error="form.errors.date_of_birth" type="datetime-local"
                            label="Date of Birth" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormSelect v-model="form.status" :error="form.errors.status" label="Status">
                            <option value="" hidden></option>
                            <option value="Alive">Alive</option>
                            <option value="Deceased">Deceased</option>
                        </FormSelect>
                    </div>
                    <div class="sm:col-span-6">
                        <FormTextarea v-model="form.remarks" :error="form.errors.remarks" label="Remarks" />
                    </div>
                    <template #footer>
                        <div class="flex space-x-3">
                            <SecondaryButtonLink :href="$page.props.referrer">
                                Return
                            </SecondaryButtonLink>
                            <PrimaryButton :loading-on="form.processing" type="submit" :disabled="form.processing">
                                Submit
                            </PrimaryButton>
                        </div>
                    </template>
                </Card>
            </form>
        </div>
    </MidwifeLayout>
</template>