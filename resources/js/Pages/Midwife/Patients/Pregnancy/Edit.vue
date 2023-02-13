<script setup>
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { useNow, useDateFormat } from '@vueuse/core'

const today = useDateFormat(useNow(), 'YYYY-MM-DD HH:mm:ss')

let props = defineProps({
    patient: Object,
    delivery_types: Object
})

let form = useForm({
    delivered_at: '',
    delivery_type: '',
    active: false,
})


const submitHandler = () => {
    form.patch(route('midwife.pregnancy.update', { patient: props.patient.id }))
}
</script>

<template>
    <MidwifeLayout title="Update Pregnancy">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-3">
                        <FormSelect v-model="form.delivery_type" :error="form.errors.delivery_type"
                            label="Delivery Type">
                            <option value="" hidden></option>
                            <option v-for="(type, key) in props.delivery_types" :value="key">
                                {{ type }}
                            </option>
                        </FormSelect>
                    </div>

                    <div class="sm:col-span-3">
                        <FormInput v-model="form.delivered_at" :error="form.errors.delivered_at" type="datetime-local"
                            label="Delivery Date and Time" />
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

