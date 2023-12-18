<script setup>
import { useI18nStore } from '@/stores/i18n.js'
import HeaderComponent from '@/components/HeaderComponent.vue'
// -----------------------------------------------------------
const i18n = useI18nStore()
// -----------------------------------------------------------
</script>
<template>
  <section class="wrapper">
    <HeaderComponent menu="1" />
    <div class="wrapper">
      <div class="container content">
        <div class="row">
          <div class="col-12">
            <h1>{{ i18n._('Sección 1') }}</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped lang="scss">
@import "@/css/styles.scss";
section.wrapper {
  @include wrapperSection;
}
section {
  min-height: 100vh;
  background-color: $color3;
}
h1 {
  font-weight: 700;
  font-size: 3.2em;
  @media (max-width: $mobile) {
    font-size: 2.7em;
  }
}
</style>
