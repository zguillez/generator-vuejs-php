<script setup>
import { computed } from 'vue'
import { useI18nStore } from '@/stores/i18n.js'
import { useDataStore } from '@/stores/data.js'
import HeaderComponent from '@/components/HeaderComponent.vue'
import FooterComponent from '@/components/FooterComponent.vue'
// -----------------------------------------------------------
const i18n = useI18nStore()
const data = computed(() => useDataStore().get('section3', i18n.language))
// -----------------------------------------------------------
</script>
<template>
  <section class="wrapper">
    <HeaderComponent menu="2" />
    <div class="wrapper">
      <div class="container content">
        <div class="row">
          <div class="col-12">
            <h2>{{ i18n._('Sección 3') }}</h2>
            <ul v-html="data.html"></ul>
          </div>
        </div>
      </div>
    </div>
    <FooterComponent />
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
