<template lang="html">
   <section>
      <h1>{{ message }}</h1>
      <app-intro></app-intro>
      <app-slider></app-slider>
      <app-portfolio></app-portfolio>
   </section>
</template>

<script>
import Intro from './sub-components/Intro.vue';
import Slider from './sub-components/Slider.vue';
import Portfolio from './sub-components/Portfolio.vue';
export default {
   data: function() {
      return {
         message: 'Home Page'
      }
   },
   components: {
      'app-intro': Intro,
      'app-slider': Slider,
      'app-portfolio': Portfolio
   }
}
</script>

<style lang="css">
</style>
