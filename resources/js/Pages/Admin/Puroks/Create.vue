<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';


const form = useForm({
    name: '',
})



const submitHandler = () => {
    form.post(route('admin.puroks.store'));
}

</script>
<template>
    <AdminLayout title="Create User">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-6">
                        <FormInput v-model="form.name" :error="form.errors.name" type="text" label="Purok Name" />
                    </div>
                    <template #footer>
                        <div class="flex space-x-3">
                            <SecondaryButtonLink :href="$page.props.referrer">
                                Return
                            </SecondaryButtonLink>
                            <PrimaryButton :disabled="form.processing" :loading-on="form.processing">Submit</PrimaryButton>
                        </div>
                    </template>
                </Card>
            </form>
        </div>
    </AdminLayout>
</template>

