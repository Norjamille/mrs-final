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
    email: '',
    password: 'password',
    role: '',
})


const roles = [
    'Admin',
    'Midwife',
]

const submitHandler = () => {
    form.post(route('admin.users.store'));
}

</script>
<template>
    <AdminLayout title="Create User">
        <div>
            <form @submit.prevent="submitHandler">
                <Card>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.name" :error="form.errors.name" type="text" label="Name" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormInput v-model="form.email" :error="form.errors.email" type="email" label="Email address" />
                    </div>
                    <div class="sm:col-span-3">
                        <FormSelect v-model="form.role" :error="form.errors.role" label="Role">
                            <option value="" hidden></option>
                            <option v-for="(role, index) in roles" :key="index" :value="role.id">
                                {{ role }}
                            </option>
                        </FormSelect>
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
    </AdminLayout>
</template>

