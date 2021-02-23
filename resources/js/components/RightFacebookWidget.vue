<template>
<div>
  <vue-facebook-page data-href="https://www.facebook.com/trixhousecom" link-text="Trix House" />
</div>
</template>

<script>
export default {
  name: "RightFacebookWidget",
  data(){
    return {
      show: false
    }
  },
  props: {
    lang: ''
  },
  mounted() {

  }
}
</script>

<style scoped>

</style>