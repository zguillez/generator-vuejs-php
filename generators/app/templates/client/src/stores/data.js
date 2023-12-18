import { reactive } from 'vue'
import { defineStore } from 'pinia'

export const useDataStore = defineStore('data', () => {
  //------------------------------------------------
  const data = reactive({
    section3:
      {
        es: {
          html: '<ul><li>aaa</li><li>bbb</li><li>ccc</li></ul>'
        },
        en: {
          html: '<ul><li>ddd</li><li>eee</li><li>fff</li></ul>'
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
