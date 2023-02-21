<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import DeleteUserForm from '../Profile/Partials/DeleteUserForm.vue';
import UpdatePasswordForm from '../Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '../Profile/Partials/UpdateProfileInformationForm.vue';
import MidwifeLayout from '@/Layouts/MidwifeLayout.vue';
import { ref } from 'vue';

const props = defineProps({
  isAdmin: {
    type: Boolean,
    required: true,
  },
  isMidwife: {
    type: Boolean,
    required: true,
  },
  isPatient: {
    type: Boolean,
    required: true,
  },
});

const component = ref(null);

if (props.isAdmin) {
  component.value = AdminLayout;
} else if (props.isMidwife) {
  component.value = MidwifeLayout;
} else if (props.isPatient) {
  component.value = "div";
}
</script>
<template>
  <component :is="component" title="Profile">
    <div>
      <div class="mx-auto space-y-6 ">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
          <UpdateProfileInformationForm class="max-w-xl" />
        </div>

        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
          <UpdatePasswordForm class="max-w-xl" />
        </div>
      </div>
    </div>
  </component>
</template>

