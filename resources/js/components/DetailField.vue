<template>
  <panel-item :field="field">
    <template slot="value">
      <router-link
        v-if="field.value"
        :to="{name: 'detail', params: {
                    resourceName: field.auditingUserResource,
                    resourceId: field.auditingUserResourceId
                }}"
        class="no-underline font-bold dim text-primary"
      >
        {{ field.value }}
      </router-link>
      <p v-else>&mdash;</p>
    </template>
  </panel-item>
</template>

<script>
  export default {
    props: ['resource', 'resourceName', 'resourceId', 'field']
  }
</script>
