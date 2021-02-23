<template>
  <div class="page-ads">
    <form id="searchForm">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <input class="form-control" v-model="params.title"
                 :placeholder="current_lang == 'pl' ? 'Tytuł ...' : 'Title ...'"
                 aria-label="Title">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <select class="form-control" v-model="params.category"
                  aria-label="Select category">
            <option value="" selected>{{ current_lang == 'pl' ? 'Wybierz kategorię' : 'Select category' }}</option>
          </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <input class="form-control" v-model="params.location"
                 aria-label="Location" :placeholder="current_lang == 'pl' ? 'Miasto' : 'Location'">
        </div>
      </div>
    </form>

    <div v-if="data.data.length > 0" class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12" v-for="item in data.data">
        <div class="single-ad" v-bind:style="{ backgroundImage: 'url(' + item.image + ')' }">
          <div class="title">
            {{ item.title }}
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="col-lg-12">
        <div class="alert alert-warning w-100 text-center">
          {{ current_lang == 'pl' ? 'Brak danych do wyświetlenia' : 'No data to display' }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FrontAdsList",
  data() {
    return {
      data: {},
      params: {
        title: '',
        category: '',
        subcategory: '',
        location: ''
      }
    }
  },
  props: {
    type: '',
    ads_list_url: '',
    current_lang: ''
  },
  methods: {
    loadData(page = 1) {
      this.$axios.get(this.ads_list_url + `?page=${page}&title=${this.params.title}&category=${this.params.category}&subcategory=${this.params.subcategory}&type=${this.type}`)
          .then((data) => {
            this.data = data.data;
          }).catch((error) => {
        //
      })
    }
  },
  created() {
    this.loadData();
  }
}
</script>

<style scoped lang="scss">
#searchForm {
  padding: 10px;
  background: #3490dc;
  border-radius: 4px;
  margin-bottom: 30px;
}
.single-ad {
  position: relative;
  min-height: 250px;
  background-size: cover;
  border-radius: 4px;
  margin-bottom: 30px;
  .title {
    position: absolute;
    width: 100%;
    bottom: 0;
    padding: 5px;
    background: #000000b0;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    color: #efefef;
    font-size: 16px;
    text-align: center;
    min-height: 60px;
  }
}
</style>