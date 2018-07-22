<template lang="html">
   <article id="intro" class="">
      <p>Welcome to my new Portfolio Site. I built it using Laravel on the back end and Vue.js on the front end, incorporating CSS Grid and CSS Flexbos for styling. </p>

      <p>I come from a background building custom sites in Wordpress. Although I still use Wordpress a great deal, I am branching out into front end technologies like Vue.js, some React (and vanilla JS of course), as well as dabbling in Python, which I like very much.</p>

      <p>I will be adding to this site as I learn more about Vue and CSS Grid, incorporating more features, styles, and whatever else I cmoe across. Please be patient while I get this site in order!
      </p>
      <div id="support-button">
         <!-- <support-button></support-button> -->
      </div>
   </article>
</template>

<script>
import SupportButton from './SupportButton.vue';

export default {
   components: {
      'support-button': SupportButton
   }
}
</script>

<style lang="css">
</style>
