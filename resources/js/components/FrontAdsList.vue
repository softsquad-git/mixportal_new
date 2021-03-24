<template>
  <div class="page-ads">
    <form id="searchForm">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-9 col-xs-9">
          <input v-gmaps-searchbox=vm v-model="params.location" aria-label="Lokalizajca">
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-xs-3">
          <select name="radius" aria-label="Radius" class="form-control" style="min-height: 40px;">
            <option v-for="r in radius" :value="r">{{ r }}</option>
          </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <select class="form-control" v-model="params.category"
                  aria-label="Select category" style="min-height: 40px;">
            <option value="" selected>{{ current_lang == 'pl' ? 'Wybierz kategorię' : 'Select category' }}</option>
            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
          </select>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <select class="form-control" v-if="subCategories.length > 0"aria-label="Sub category"
                  style="min-height: 40px">
            <option value="" selected>{{ current_lang == 'pl' ? 'Wybierz' : 'Select'}}</option>
            <option v-for="subcategory in subCategories" :value="subcategory.id">{{ subcategory.name }}</option>
          </select>
        </div>
      </div>
    </form>

    <div v-if="data.data.length > 0" class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12" v-for="item in data.data">
        <a :href="ad_url+`?ad_id=${item.id}`" style="display: block;" class="single-ad" v-bind:style="{ backgroundImage: 'url(' + item.image + ')' }">
          <div class="title">
            {{ item.title }}
          </div>
        </a>
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
  components: {
    Places: () => import('vue-places')
  },
  data() {
    return {
      data: {},
      params: {
        title: '',
        category: '',
        subcategory: '',
        location: ''
      },
      radius: [0, 10, 25, 50, 100, 150, 200, 350, 500],
      categories: [],
      subCategories: [],
      vm: ''
    }
  },
  props: {
    type: '',
    ads_list_url: '',
    current_lang: '',
    ad_url: '',
    categories_url: '',
    sub_categories_url: ''
  },
  methods: {
    loadData(page = 1) {
      this.$axios.get(this.ads_list_url + `?page=${page}&title=${this.params.title}&category=${this.params.category}&subcategory=${this.params.subcategory}&type=${this.type}`)
          .then((data) => {
            this.data = data.data;
            this.loadCategories();
          }).catch((error) => {
        //
      })
    },
    loadCategories() {
      this.$axios.get(this.categories_url)
          .then(data => {
            this.categories = data.data.data;
          }).catch(error => {
        console.log('Nie udało się załadować katagorii')
      })
    },
    loadSubCategories(id) {
      this.$axios.get(this.sub_categories_url+`?category_id=${id}`)
          .then((data) => {
            this.subCategories = data.data.data;
          }).catch((error) => {
        console.log('Nie udało się załadować kategorii podrzędnych')
      })
    },
  },
  watch: {
    'params.category' () {
      this.loadSubCategories(this.params.category);
      this.loadData();
    },
    'params.subcategory' () {
      this.loadData();
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