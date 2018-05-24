<template lang="html">
   <section id="front-page-container">
      <app-intro></app-intro>
      <app-slider></app-slider>
      <app-portfolio></app-portfolio>
   </section>
</template>

<script>
import Intro from './sub-components/Intro.vue';
import Slider from './sub-components/Slider.vue';
import PortfolioFilter from './sub-components/PortfolioFilter.vue';
import Portfolio from './sub-components/Portfolio.vue';
export default {
   data: function() {
      return {
         message: 'this is a message'
      }
   },
   components: {
      'app-intro': Intro,
      'app-slider': Slider,
      'app-portfolio': Portfolio,
      'app-portfolio-filter': PortfolioFilter
   }
}
</script>

<style lang="css">
</style>
