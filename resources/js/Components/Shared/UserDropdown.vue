<script setup>
import DropdownLink from "../DropdownLink.vue";
import { ref } from "vue"
import {
    UserIcon
} from '@heroicons/vue/24/outline'
let show = ref(false)
</script>
<template>
    <div class="relative ml-3">
        <div>
            <button type="button" @click="show = !show"
                class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <UserIcon class="w-6 h-6 text-gray-400 rounded-full" />
            </button>
        </div>
        <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
            <div v-show="show"
                class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                <DropdownLink :href="route('logout')" method="post" as="button">
                    Log Out
                </DropdownLink>
            </div>
        </transition>
    </div>
</template>


