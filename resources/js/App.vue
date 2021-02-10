<template>
  <main>
    <Header></Header>
       <router-view></router-view>
  </main>
</template>
<script>
    import Header from './pages/Header.vue';
export default {
  components: {
       Header,
  },
};
</script>
<style>
</style>
