Nova.booting((Vue, router) => {
  Vue.component('index-nova-auditing-created-by-field', require('./components/created-by/IndexField'))
  Vue.component('detail-nova-auditing-created-by-field', require('./components/created-by/DetailField'))
  Vue.component('index-nova-auditing-updated-by-field', require('./components/updated-by/IndexField'))
  Vue.component('detail-nova-auditing-updated-by-field', require('./components/updated-by/DetailField'))
})
