<template>
<div>
  <button v-if="!show" @click="show = true" class="open-facebook-right-widget">facebook</button>
  <div v-if="show" class="facebook-right-widget">
    <div @click="show = false" class="close-facebook-right-widget">
      {{ lang == 'pl' ? 'Zamknij' : 'Close'}}
    </div>
    <div class="fb-page" data-href="https://www.facebook.com/trixhousecom" data-tabs="timeline" data-width="250" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/trixhousecom" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/trixhousecom">Trix House</a></blockquote></div>
  </div>
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
  }
}
</script>

<style scoped>

</style>