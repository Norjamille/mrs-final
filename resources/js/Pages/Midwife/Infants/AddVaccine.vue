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
  vaccines: Object,
  months: Object
})

let form = useForm({
  infant_id: props.infant.id,
  vaccine: '',
  date_at: '',
  months_after_birth: '',
});

const submitHandler = () => {
  form.post(route('midwife.infants.store-vaccine'))
}
</script>

<template>
  <MidwifeLayout title="Record Infant">
    <div>
      <form @submit.prevent="submitHandler">
        <Card>
          <div class="sm:col-span-3">
            <FormSelect v-model="form.vaccine" :error="form.errors.vaccine" label="Vaccine">
              <option value="" hidden></option>
              <option v-for="(vaccine, key) in vaccines" :key="key" :value="key">
                {{ vaccine }}
              </option>
            </FormSelect>
          </div>
          <div class="sm:col-span-3">
            <FormInput v-model="form.date_at" :error="form.errors.date_at" type="date" label="Date" />
          </div>
          <div class="sm:col-span-3">
            <FormSelect v-model="form.months_after_birth" :error="form.errors.months_after_birth"
              label="Month after birth">
              <option value="" hidden></option>
              <option v-for="(month, key) in months" :key="key" :value="key">
                {{ month }}
              </option>
            </FormSelect>
          </div>
          <template #footer>
            <div class="flex space-x-3">
              <SecondaryButtonLink :href="route('midwife.infants')">
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