<template>
  <main>
<Header></Header>

<Sidebar></Sidebar>

  <div class="content-wrapper">
     <router-view></router-view>
  </div>
 <Footer></Footer>
  </main>
</template>
<script>
import Header from './pages/Header';
import Sidebar from './pages/Sidebar';
import Footer from './pages/Footer';
export default {
  components: {
    Header,
    Sidebar,
    Footer,
  },
};
</script>
<style>
</style>