<template>
  <header class="header">
    <h1 class="site_title">
      <nuxt-link to="/">My Rent</nuxt-link>
    </h1>
    <div class="header-nav">
      <nuxt-link class="header-nav-item" to="/">トップ</nuxt-link>
      <nuxt-link class="header-nav-item" to="/register-rent">賃貸を登録</nuxt-link>
    </div>
  </header>
</template>

<style lang="scss" scoped>
.header {
  display: flex;
  justify-content: space-between;
  padding: 0 50px;
  height: 70px;
  line-height: 70px;
  margin-bottom: 40px;

  &-nav {
    &-item {
      margin-right: 30px;
    }
  }
}
</style>
