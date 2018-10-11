Nova.booting((Vue, router) => {
  Vue.component('index-nova-auditing-user-field', require('./components/IndexField'))
  Vue.component('detail-nova-auditing-user-field', require('./components/DetailField'))
})
