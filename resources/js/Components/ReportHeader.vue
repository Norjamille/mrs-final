<script setup>
const props = defineProps({
  reportTitle: String,
})
</script>
<template>
  <div>
    <div style="text-align: center; font-size: 20pt; font-weight: bold;">Maternal Recording System in Barangay Biwang,
      Bagumbayan Sultan Kudarat</div>
    <p style="font-size: 1.25rem; font-weight: 600; text-align: center; margin-top: 20px;">
      {{ props.reportTitle }}
    </p>
  </div>
</template>


