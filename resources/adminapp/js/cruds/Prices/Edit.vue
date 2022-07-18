<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.price.title_singular') }}</strong>
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
                      'has-items': entry.mmr,
                      'is-focused': activeField == 'mmr'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.price.fields.mmr')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.mmr"
                      @input="updateMmr"
                      @focus="focusField('mmr')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.caroffer,
                      'is-focused': activeField == 'caroffer'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.price.fields.caroffer')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.caroffer"
                      @input="updateCaroffer"
                      @focus="focusField('caroffer')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.blackbook,
                      'is-focused': activeField == 'blackbook'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.price.fields.blackbook')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.blackbook"
                      @input="updateBlackbook"
                      @focus="focusField('blackbook')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.retail,
                      'is-focused': activeField == 'retail'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.price.fields.retail')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.retail"
                      @input="updateRetail"
                      @focus="focusField('retail')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.car_id !== null,
                      'is-focused': activeField == 'car'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.price.fields.car')
                    }}</label>
                    <v-select
                      name="car"
                      label="model"
                      :key="'car-field'"
                      :value="entry.car_id"
                      :options="lists.car"
                      :reduce="entry => entry.id"
                      @input="updateCar"
                      @search.focus="focusField('car')"
                      @search.blur="clearFocus"
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
    ...mapGetters('PricesSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('PricesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setMmr',
      'setCaroffer',
      'setBlackbook',
      'setRetail',
      'setCar'
    ]),
    updateMmr(e) {
      this.setMmr(e.target.value)
    },
    updateCaroffer(e) {
      this.setCaroffer(e.target.value)
    },
    updateBlackbook(e) {
      this.setBlackbook(e.target.value)
    },
    updateRetail(e) {
      this.setRetail(e.target.value)
    },
    updateCar(value) {
      this.setCar(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'prices.index' })
          this.$eventHub.$emit('update-success')
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
