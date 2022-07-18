<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.car.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.year,
                      'is-focused': activeField == 'year'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.car.fields.year')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.year"
                      @input="updateYear"
                      @focus="focusField('year')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.make,
                      'is-focused': activeField == 'make'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.car.fields.make')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.make"
                      @input="updateMake"
                      @focus="focusField('make')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.model,
                      'is-focused': activeField == 'model'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.car.fields.model')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.model"
                      @input="updateModel"
                      @focus="focusField('model')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('CarsSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CarsSingle', [
      'storeData',
      'resetState',
      'setYear',
      'setMake',
      'setModel'
    ]),
    updateYear(e) {
      this.setYear(e.target.value)
    },
    updateMake(e) {
      this.setMake(e.target.value)
    },
    updateModel(e) {
      this.setModel(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'cars.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
