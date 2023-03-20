<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { useForm } from '@inertiajs/vue3';

let props = defineProps({
    patient: Object
})

let form = useForm({
    age_of_gestation: '',
    days_of_gestation: '',
    baby_count: '',
})

const submitHandler = () => {
    form.post(route('midwife.pregnancy.store', { patient: props.patient.id }))
}
</script>

<template>
    <MidwifeLayout title="Create Pregnancy">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.age_of_gestation" :error="form.errors.age_of_gestation" type="number"
                            label="Month (Age of Gestation)" />
                    </div>

                    <div class="sm:col-span-3">
                        <FormInput v-model="form.days_of_gestation" :error="form.errors.days_of_gestation" type="number"
                            label="Days (Age of Gestation)" />
                    </div>

                    <div class="sm:col-span-3">
                        <FormInput v-model="form.baby_count" :error="form.errors.baby_count" type="number"
                            label="No. of baby" />
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

