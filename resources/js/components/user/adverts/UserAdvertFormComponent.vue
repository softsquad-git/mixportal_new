<template>
  <div class="content">
    <form @submit.prevent="save">
      <div class="row">
        <div class="col-md-3">
          <button class="btn-lang" type="button" @click="changeLang('pl')" :class="lang == 'pl' ? 'active': ''">Polski
          </button>
          <button class="btn-lang" type="button" @click="changeLang('en')" :class="lang == 'en' ? 'active': ''">
            English
          </button>
          <small class="text-center d-block w-100">
            Od teraz możesz dodawać swoje ogłoszenia zarówno w języku polskim jak i angielskim
          </small>
        </div>
        <div class="col-md-9">
          <div v-if="lang == 'pl'">
            <div class="form-group row">
              <div class="col-md-8">
                <input id="titlePL" aria-label="Tytuł" class="form-control" placeholder="Tytuł"
                       v-model="data.trans.pl.title">
              </div>
              <div class="col-md-4">
                <div class="input-group mb-3">
                  <input aria-label="Cena" id="price" placeholder="Cena" type="number" class="form-control"
                         v-model="data.trans.pl.price" required>
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">PLN</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-2">
              <ckeditor v-model="data.trans.pl.content" :config="editorConfig"></ckeditor>
            </div>
          </div>
          <div v-if="lang == 'en'">
            <div class="form-group row">
              <div class="col-md-8">
                <input aria-label="Title" class="form-control" placeholder="Title" v-model="data.trans.en.title">
              </div>
              <div class="col-md-4">
                <div class="input-group mb-3">
                  <input aria-label="Price" placeholder="Price" type="number" class="form-control"
                         v-model="data.trans.en.price" required>
                  <div class="input-group-append">
                    <span class="input-group-text">UTC</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group mt-2">
              <ckeditor v-model="data.trans.en.content" :config="editorConfig"></ckeditor>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <input type="email" aria-label="E-mail" placeholder="E-mail do formularza kontaktowego" class="form-control"
                 v-model="data.email">
          <small class="form-text text-muted">W przypadku braku maila brak formularza kontaktowego</small>
        </div>
        <div class="col-md-4">
          <input type="email" aria-label="E-mail" placeholder="E-mail widoczny w ogłoszeniu" class="form-control"
                 v-model="data.email_visible">
          <small class="form-text text-muted">Może być to email rejestracyjny lub ten do formularza kontaktowego</small>
        </div>
        <div class="col-md-4">
          <input type="text" aria-label="Phone" placeholder="Telefon" class="form-control" v-model="data.phone">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="fb"><img :src="fb_url" alt="instagram" width="20"></span>
            </div>
            <input type="text" class="form-control" aria-label="Instagram" v-model="data.fb" placeholder="Facebook">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="ig"><img :src="ig_url" alt="instagram" width="20"></span>
            </div>
            <input type="text" class="form-control" aria-label="Instagram" v-model="data.ig" placeholder="Instagram">
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group">
            <div class="input-group-prepend">
                                            <span class="input-group-text" id="www"><svg width="1em" height="1em"
                                                                                         viewBox="0 0 16 16"
                                                                                         class="bi bi-globe"
                                                                                         fill="currentColor"
                                                                                         xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M1.018 7.5h2.49c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5zM2.255 4H4.09a9.266 9.266 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.024 7.024 0 0 0 2.255 4zM8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm-.5 1.077c-.67.204-1.335.82-1.887 1.855-.173.324-.33.682-.468 1.068H7.5V1.077zM7.5 5H4.847a12.5 12.5 0 0 0-.338 2.5H7.5V5zm1 2.5V5h2.653c.187.765.306 1.608.338 2.5H8.5zm-1 1H4.51a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm1 2.5V8.5h2.99a12.495 12.495 0 0 1-.337 2.5H8.5zm-1 1H5.145c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12zm-2.173 2.472a6.695 6.695 0 0 1-.597-.933A9.267 9.267 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM1.674 11H3.82a13.651 13.651 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm8.999 3.472A7.024 7.024 0 0 0 13.745 12h-1.834a9.278 9.278 0 0 1-.641 1.539 6.688 6.688 0 0 1-.597.933zM10.855 12H8.5v2.923c.67-.204 1.335-.82 1.887-1.855A7.98 7.98 0 0 0 10.855 12zm1.325-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm.312-3.5h2.49a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.91 4a9.277 9.277 0 0 0-.64-1.539 6.692 6.692 0 0 0-.597-.933A7.024 7.024 0 0 1 13.745 4h-1.834zm-1.055 0H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                                             </svg></span>
            </div>
            <input type="text" aria-label="Strona www" placeholder="Strona www" class="form-control" v-model="data.www">
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "UserAdvertFormComponent",
  data() {
    return {
      data: {
        trans: {
          pl: {
            title: '',
            content: 'Treść',
            price: ''
          },
          en: {
            title: '',
            content: 'Content',
            price: ''
          }
        },
        category_id: '',
        subcategory_id: '',
        type: this.type,
        phone: '',
        email: '',
        email_visible: '',
        www: '',
        fb: '',
        ig: '',
        yt: '',
        soundcloud: '',
        mixcloud: '',
        beatport: ''
      },
      lang: '',
      editorConfig: {

      }
    }
  },
  props: {
    type: '',
    fb_url: '',
    ig_url: ''
  },
  methods: {
    changeLang(lang) {
      this.lang = lang;
    }
  },
  created() {
    this.lang = 'pl'
  }
}
</script>

<style scoped lang="sass">
.btn-lang
  display: block
  width: 100%
  margin-bottom: 5px
  padding: 5px
  font-size: 17px
  letter-spacing: 0.5px
  background: #f1f1f18a
  border: 1px solid #eaeaea

  &.active
    background: #0099ff
    color: #fff
    font-weight: bold
</style>