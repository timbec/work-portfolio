<template lang="html">
   <section id="#portfolio">
      <h3>Portfolio</h3>
      <li v-for="work in works">
         <figure>
            <img :src="'/images/' + work.featured_image" />
         </figure>
         {{ work.title }}
         {{ work.work_category.name }}
      </li>
   </section>
</template>
<!-- org/v2/examples/commits.html -->
<script>
import Axios from 'axios';
export default {
   data() {
      return {
         works: [],
         work: {
            title: '',
            featured_image: '',
            work_category: {
               name: ''
            }
         }
      }
   },
   created() {
      Axios.get('/test').then(response => this.works = response.data.data);

      //then(response => console.log(response.data));
   }
}
</script>

<style lang="css">
</style>
