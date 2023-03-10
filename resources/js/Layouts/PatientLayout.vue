<template>
  <Head :title="props.title" />
  <div class="min-h-full">
    <nav class="bg-rose-600">
      <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="flex items-center flex-shrink-0 px-4 space-x-4">
                <div class="p-3 bg-white rounded-full">
                  <img class="w-auto h-5" :src="logo" alt="Your Company">
                </div>
                <span class="text-xl font-bold tracking-widest text-white">M.R.S</span>
              </div>
            </div>
            <div class="hidden md:block">
              <div class="flex items-baseline ml-10 space-x-4">
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="flex items-center ml-4 md:ml-6">
              <div class="relative ml-3">
                <Dropdown>
                  <template #trigger>
                    <div class="flex items-center space-x-3">
                      <span class="text-white">
                        {{ $page.props.auth.user.name }}
                      </span>
                      <ChevronDownIcon class="h-5 text-white" />
                    </div>
                  </template>
                  <template #content>
                    <Link href="/account" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                      id="user-menu-item-0">Manage Account</Link>
                    <DropdownLink :href="route('logout')" method="post" as="button">
                      Log Out
                    </DropdownLink>
                  </template>
                </Dropdown>
              </div>
            </div>
          </div>
          <div class="flex -mr-2 md:hidden">
            <Dropdown>
              <template #trigger>
                <div class="flex items-center space-x-3">
                  <span class="text-white">
                    {{ $page.props.auth.user.name }}
                  </span>
                  <ChevronDownIcon class="h-5 text-white" />
                </div>
              </template>
              <template #content>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                  id="user-menu-item-0">Your Profile</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                  id="user-menu-item-1">Settings</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                  id="user-menu-item-2">Sign out</a>
              </template>
            </Dropdown>
          </div>
        </div>
      </div>
    </nav>
    <main>
      <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 ">
        <slot />
      </div>
    </main>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { ChevronDownIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/vue3';
import logo from "@/images/logo.png"
const props = defineProps({
  title: String
})
</script>

