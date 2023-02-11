<script setup>

</script>
<template>
    <div class=" md:mt-0">
        <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <div class="sm:grid sm:grid-cols-6 gap-4">
                    <slot />
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <slot name="footer" />
            </div>
        </div>
    </div>
</template>



