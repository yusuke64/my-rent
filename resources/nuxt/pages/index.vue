<template>
  <div>
    <div class="rentAllItem" v-for="rentItem in allRentItems" :key="rentItem.id">
      <div class="rentAllItemContent">
        <p class="rentAllItemContent-name">{{ rentItem.name }}</p>
      </div>
      <div class="rentAllItemContent">
        <span class="rentAllItemContent-score">{{ rentItem.score }} 点</span>
        <span class="rentAllItemContent-station">{{ rentItem.station　}}</span>
      </div>
      <div class="rentAllItemContent">
        <p class="rentAllItemContent-memo">{{ rentItem.memo }}</p>
      </div>
      <button class="button delete rentAllItem-delete" @click="deleteRentItem(rentItem.id)">削除</button>
      <nuxt-link class="rentAllItem-detail" :to="'/rent-detail/' + rentItem.id">詳しく見る</nuxt-link>
    </div>
    <nuxt-link to="/register-rent">賃貸を登録</nuxt-link>
  </div>
</template>
<script>
import { all } from 'q';
export default{
  data() {
    return {
      allRentItems: []
    }
  },
  methods: {
    deleteRentItem(itemId) {
      this.$axios.$delete('delete-rent', {
        params: {
          id: itemId
        }
      }).then(response => {
        this.rentReflesh()
      })
    },
    async rentReflesh() {
      await this.$axios.$get('all-rent')
      .then(response => {
        this.allRentItems = response
        console.log(response[0].memo)
      })
      .catch(error => {
        console.log(error)
      })
    }
  },
  created () {
    this.rentReflesh()
  }
}
</script>

<style lang="scss">
.rentAllItem {
  margin-bottom: 40px;
  border: 2px solid #8f8c8c;
  padding: 30px;
  position: relative;

  &Content {
    font-size: 18px;
    margin-bottom: 15px;

    &-name {
      font-size: 23px;
      margin-bottom: 20px;
    }

    &-score {
      margin-bottom: 10px;
      margin-right: 20px;
    }

    &-memo {
      white-space: pre-wrap;
      word-break: break-all;
      display: -webkit-box;
      -webkit-box-orient: vertical;
      -webkit-line-clamp: 3;
      overflow: hidden;
    }
  }

  &-delete {
    position: absolute;
    top: 30px;
    right: 30px;
  }

  &-detail {
    display: block;
    text-align: right;
  }
}
</style>
