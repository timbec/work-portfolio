<template lang="html">
<header id="masthead">

  <h1 id="site-title">
     <router-link to="/">
   <span class="title">
   Tim Beckett
   </span>
   <span class="tagline">
     Web Portfolio
   </span>
      </router-link>
  </h1>
  <app-menu></app-menu>
</header>
</template>

<script>
import Menu from './sub-components/Menu.vue';
export default {
   props: ['main'],
   components: {
      'app-menu': Menu
   }
}
</script>

<style lang="css">
</style>
