<script setup>
import { useI18nStore } from '@/stores/i18n.js'
import FooterComponent from '@/components/FooterComponent.vue';
// -----------------------------------------------------------
const i18n = useI18nStore()
// -----------------------------------------------------------
</script>
<template>
  <section class="wrapper">
    <div class="wrapper">
      <div class="container content">
        <div class="row">
          <div class="col-12">
            <h2>i18n._('Sección 2')</h2>
          </div>
        </div>
      </div>
    </div>
    <FooterComponent/>
  </section>
</template>
<style scoped lang="scss">
@import "@/css/styles.scss";
section.wrapper {
  @include wrapperSection;
}
section {
  min-height: 100vh;
  background-color: $color4;
}
h2 {
  font-weight: 700;
  font-size: 3em;
  @media (max-width: $mobile) {
    font-size: 2.4em;
  }
}
</style>
