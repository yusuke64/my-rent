<template>
  <div class="rent-detail">
    <input class="input-text" v-model="name" :disabled="readonly" @input="inputChange('name')">
    <div class="input-wrap">
      <input class="input-number" min="1" max="5" type="number" v-model="score" :disabled="readonly" @input="inputChange('score')">
      <input class="input-text" v-model="station" :disabled="readonly" @input="inputChange('station')">
    </div>
    <textarea class="input-textarea" cols="30" rows="5" v-model="memo" :disabled="readonly" @input="inputChange('memo')"></textarea>
    <button class="button editMode" v-if="readonly" @click="editMode">編集</button>
    <div class="edit-buttons" v-else>
      <button class="button back" @click="back">戻る</button>
      <button class="button edit" @click="edit" :disabled="inputChanged">更新</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: null,
      name: '',
      score: null,
      station: '',
      memo: '',
      readonly: true,
      inputChanged: true,
      defaultValue: []
    }
  },
  created() {
    this.detailReflesh()
  },
  methods: {
    editMode() {
      this.readonly = false
    },
    async edit() {
      const params = new URLSearchParams()

      params.append('id', this.id)
      params.append('name', this.name)
      params.append('score', this.score)
      params.append('station', this.station)
      params.append('memo', this.memo)

      await this.$axios.$post('edit-rent', params).then(response => {
        this.detailReflesh()
        this.readonly = true
      }).catch(error => {
        console.log(error)
      })
    },
    async detailReflesh() {
      await this.$axios.$get('detail', {
        params: {
          id: this.$route.params['id']
        }
      }).then(response => {
        this.id = response.id
        this.name = response.name
        this.score = response.score
        this.station = response.station
        this.memo = response.memo

        this.defaultValue = response
      }).catch(error => {
        console.log(error)
      })
    },
    back() {
      this.detailReflesh()
      this.readonly = true
      this.inputChanged = true
    },
    inputChange(val) {
      if(!(this.defaultValue[val] === this[val])) {
        this.inputChanged = false
      } else {
        this.inputChanged = true
      }
    }
  }
}
</script>

<style lang="scss">
.rent-detail {
  margin: 80px auto;
  width: 600px;
  border: 1px solid #918f8f;
  padding: 20px;

  .editMode {
    margin-left: 20px;
  }

  .edit-buttons {
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
  }

  .input-wrap {
    display: flex;

    .input-number {
      margin-right: 20px;
      width: 30%;
    }
  }
}
</style>