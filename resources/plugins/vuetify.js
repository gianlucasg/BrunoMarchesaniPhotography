import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import '@mdi/font/css/materialdesignicons.css'
import 'font-awesome/css/font-awesome.min.css'

Vue.use(Vuetify)

const opts = {}

export default new Vuetify({
    icons: {
      iconfont: 'mdi', // default - only for display purposes
    },
  })