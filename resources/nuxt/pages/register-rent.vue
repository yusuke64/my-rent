<template>
  <div class="registerRent">
    <div class="registerRent">
      <input type="text" v-model="name" placeholder="建物名">
    </div>
    <div class="registerRent flex">
      <input class="input-number" type="number" v-model="score" min="1" max="5" placeholder="評価">
      <input class="input-text" type="text" v-model="station" placeholder="駅名">
    </div>
    <div class="registerRent">
      <textarea cols="30" rows="10" v-model="memo" placeholder="メモ"></textarea>
    </div>
    <button class="button" type="button" @click="register">登録</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      score: null,
      station: '',
      memo: '',
    }
  },
  methods: {
    async register() {

      const params = new URLSearchParams()

      params.append('name', this.name)
      params.append('score', this.score)
      params.append('station', this.station)
      params.append('memo', this.memo)

      await this.$axios.$post('register-rent', params)
      .then(response => {
        this.$router.push(`/rent-detail/${response}`)
      })
    }
  }
}
</script>

<style lang="scss">
.registerRent {
  &.flex {
    display: flex;

    .input-number {
      width: 30%;
      margin-right: 20px;
    }
  }
}
</style>