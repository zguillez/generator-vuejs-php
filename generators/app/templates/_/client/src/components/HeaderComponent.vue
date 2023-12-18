<script setup>
import { useI18nStore } from '@/stores/i18n.js'
// -----------------------------------------------------------
const i18n = useI18nStore()
const { menu } = defineProps(['menu'])
// -----------------------------------------------------------
</script>
<template>
  <header>
    <ul>
      <li>
        <a href="/" :class="(menu==='1')?'active':''">Home</a>
      </li>
      <li>
        <a href="/page1" :class="(menu==='2')?'active':''">Page 1</a>
      </li>
    </ul>
    <ul>
      <li v-for="(lang, index) in i18n.languages" :key="index">
        <a :class="lang===i18n.language?'active':''" href="#" @click="i18n.set(lang)" v-html="lang"></a>
      </li>
    </ul>
  </header>
</template>
<style scoped lang="scss">
@import "@/css/styles.scss";
header {
  @include baseText;
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  padding: 3vh 0;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  background-color: $color2;
  @media (max-width: $mobile) {
    position: relative;
  }
}
ul {
  margin: 0;
  padding: 0 1em;
  display: flex;
  align-items: center;
  justify-content: center;
  li {
    padding: 0 10px;
    list-style: none;
    a {
      color: $color1;
      text-transform: uppercase;
      &.active {
        font-weight: 700;
        color: $color5;
      }
    }
  }
}
</style>
