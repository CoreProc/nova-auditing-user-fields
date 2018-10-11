Nova.booting((Vue, router) => {
    Vue.component('index-nova-auditing-created-by-field', require('./components/created-by/IndexField'));
    Vue.component('detail-nova-auditing-created-by-field', require('./components/created-by/DetailField'));
    // Vue.component('form-nova-auditing-user-fields', require('./components/FormField'));
})
