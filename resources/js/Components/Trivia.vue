<template>
  <div class="pt-24 pb-16 bg-white sm:pt-32 sm:pb-24 xl:pb-32">
    <div class="pb-20 bg-gray-900 sm:pb-24 xl:pb-0">
      <div
        class="flex flex-col items-center px-6 mx-auto max-w-7xl gap-y-10 gap-x-8 sm:gap-y-8 lg:px-8 xl:flex-row xl:items-stretch">
        <div class="w-full max-w-2xl -mt-8 xl:-mb-8 xl:w-96 xl:flex-none">
          <div class="relative aspect-[2/1] h-full md:-mx-8 xl:mx-0 xl:aspect-auto">
            <img class="absolute inset-0 object-cover w-full h-full bg-gray-800 shadow-2xl rounded-2xl" :src="img" alt="">
          </div>
        </div>
        <div class="w-full max-w-2xl xl:max-w-none xl:flex-auto xl:py-24 xl:px-16">
          <figure class="relative pt-6 isolate sm:pt-12">
            <h1 class="text-xl font-semibold leading-8 text-rose-500 sm:text-2xl sm:leading-9">
              {{ title }}
            </h1>
            <blockquote class="text-xl font-semibold leading-8 text-white sm:text-2xl sm:leading-9">
              <slot />
            </blockquote>
          </figure>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const props = defineProps({
  title: String,
  img: String,
})
</script>

