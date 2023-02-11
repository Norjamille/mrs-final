<template>
    <div class="flex flex-col">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th v-for="(head, index) in headers" scope="col"
                                    class="py-3.5 pl-4 pr-3 uppercase text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    {{ head }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <slot />
                        </tbody>
                    </table>
                </div>
                <div>
                    <slot name="footer" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    headers: Array
})
</script>

