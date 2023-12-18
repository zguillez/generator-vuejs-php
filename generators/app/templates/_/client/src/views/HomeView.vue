<script setup>
import Section1Component from '@/components/Section1Component.vue'
import Section2Component from '@/components/Section2Component.vue'
</script>
<template>
  <main class="container-fluid">
    <div class="row">
      <Section1Component class="col-12" />
      <Section2Component class="col-12" />
    </div>
  </main>
</template>
<style lang="scss">
@import "@/css/styles.scss";
main {
  background: $color1;
}
</style>

