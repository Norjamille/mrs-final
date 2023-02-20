<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import FormInput from '@/Components/FormInput.vue';
import FormSelect from '@/Components/FormSelect.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButtonLink from '@/Components/SecondaryButtonLink.vue';
import { router } from '@inertiajs/core';
import { reactive } from 'vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

let deleteModal = reactive({
    show: false,
    id: props.user.id,
    proccessing: false,
})


const showDeleteModel = () => {
    deleteModal.show = true;
}

const hideDeleteModel = () => {
    deleteModal.show = false;
}

const deleteHandler = () => {
    deleteModal.proccessing = true;
    router.delete(route('admin.users.destroy', { user: deleteModal.id }),
        {
            onFinish: () => {
                hideDeleteModel();
                deleteModal.proccessing = false;
            }
        }
    );
}


const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
})


const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role: props.user.role,
})


const roles = [
    'Admin',
    'Midwife',
]

const submitHandler = () => {
    form.patch(route('admin.users.update', { user: props.user.id }));
}

</script>
<template>
    <AdminLayout title="Edit User">
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
                            <SecondaryButtonLink :href="route('admin.users')">
                                Return
                            </SecondaryButtonLink>
                            <PrimaryButton>Submit</PrimaryButton>
                        </div>
                    </template>
                </Card>
            </form>
        </div>

        <div class="flex flex-col gap-2 p-3 mt-5 bg-red-100 border border-red-300 rounded-xl">
            <span class="text-red-500">
                Delete User | Attention! This action is irreversible.
            </span>
            <div>
                <SecondaryButton @click="showDeleteModel">
                    Delete
                </SecondaryButton>
            </div>
        </div>

        <teleport to='body'>
            <ConfirmationModal :show="deleteModal.show">
                <template #title>
                    Delete User
                </template>
                <template #content>
                    <p class="text-gray-500">
                        Are you sure you want to delete this user?
                    </p>
                </template>
                <template #footer>
                    <SecondaryButton @click="hideDeleteModel" type="button" class="mr-2">Cancel</SecondaryButton>
                    <PrimaryButton @click="deleteHandler" :loading-on="deleteModal.proccessing"
                        :disabled="deleteModal.proccessing" type="button" class="mr-2">Delete</PrimaryButton>
                </template>
            </ConfirmationModal>
        </teleport>
    </AdminLayout>
</template>

