<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { useForm } from '@inertiajs/vue3';

let props = defineProps({
    puroks: Object
})

let form = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
    address: '',
    middle_name: '',
    purok_id: '',
    email: '',
    contact_number: '',
    contact_number: '',
    date_of_birth: '',
})

const submitHandler = () => {
    form.post(route('midwife.patients.store'));
}
</script>

<template>
    <MidwifeLayout title="Create Patient">
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
                            <SecondaryButtonLink :href="$page.props.referrer">
                                Return
                            </SecondaryButtonLink>
                            <PrimaryButton>Submit</PrimaryButton>
                        </div>
                    </template>
                </Card>
            </form>
        </div>
    </MidwifeLayout>
</template>