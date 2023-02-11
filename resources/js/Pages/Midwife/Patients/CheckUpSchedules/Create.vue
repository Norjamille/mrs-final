<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormTextarea from '@/Components/FormTextarea.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { useForm } from '@inertiajs/vue3';

let props = defineProps({
    patient: Object
})

let form = useForm({
    date_at: '',
    description: '',
})

const submitHandler = () => {
    form.post(route('midwife.pregnancy.check-up.schedules.store', { patient: props.patient.id }))
}
</script>

<template>
    <MidwifeLayout title="Create Check Up Schedule">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.date_at" :error="form.errors.date_at" type="datetime-local"
                            label="Date" />
                    </div>
                    <div class="sm:col-span-6">
                        <FormTextarea v-model="form.description" :error="form.errors.description" label="Description" />
                    </div>
                    <template #footer>
                        <div class="flex space-x-3">
                            <SecondaryButtonLink :href="$page.props.referrer">
                                Return
                            </SecondaryButtonLink>
                            <PrimaryButton :loading-on="form.processing" :disabled="form.processing" type="submit">
                                Submit</PrimaryButton>
                        </div>
                    </template>
                </Card>
            </form>
        </div>
    </MidwifeLayout>
</template>