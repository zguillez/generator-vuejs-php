<script setup>
import { RouterView } from 'vue-router'
import CookiesComponent from '@/components/CookiesComponent.vue'
</script>
<template>
  <RouterView />
    <CookiesComponent gtm="GTM-XXXXXXX" />
</template>
<style lang="scss">
@import "@/css/styles.scss";
html {
  background: $color1;
}
body {
  overflow-x: hidden;
}
</style>
