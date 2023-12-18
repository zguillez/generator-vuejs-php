import {ref} from 'vue';
import {defineStore} from 'pinia';

export const useIdiomaStore = defineStore('idioma', () => {

  const idioma = ref('es');

  function setIdioma(lang) {
    if (['es', 'en'].includes(lang)) idioma.value = lang;
    localStorage.setItem('idioma', idioma.value);
  }

  return {
    idioma, setIdioma,
  };
});
