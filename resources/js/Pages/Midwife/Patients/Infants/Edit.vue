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
    infant: Object,
})

let form = useForm({
    pregnancy_id: props.infant.pregnancy_id,
    first_name: props.infant.first_name,
    last_name: props.infant.last_name,
    gender: props.infant.gender,
    date_of_birth: props.infant.date_of_birth,
    remarks: props.infant.remarks,
    status: props.infant.status,
});

const submitHandler = () => {
    form.patch(route('midwife.patients.infant.update', { infant: props.infant.id }))
}
</script>

<template>
    <MidwifeLayout title="Edit Infant">
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