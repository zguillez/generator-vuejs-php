import { reactive } from 'vue'
import { defineStore } from 'pinia'

export const useDataStore = defineStore('data', () => {
  //------------------------------------------------
  const data = reactive({
    section3:
      {
        es: {
          info: 'descripción:',
          html: '<ul><li>a</li><li>b</li><li>c</li></ul>'
        },
        en: {
          info: 'description:',
          html: '<ul><li>c</li><li>d</li><li>e</li></ul>'
        }
      }
  })

  function get(section, language) {
    return data[section][language]
  }

  return {
    get
  }
})
