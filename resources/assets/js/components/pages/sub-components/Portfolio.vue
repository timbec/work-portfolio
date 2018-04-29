<template lang="html">
   <section id="#portfolio">
      <h3>Portfolio</h3>
      <nav id="filter">
         
      </nav>

      <select v-model="selected">
        <option default value="">All</option>
        <option>Agency</option>
        <option>Client</option>
        <option>Personal</option>
     </select>
      <li v-for="(work, i) in filteredByCategory">
         <figure>
            <img :src="'/images/' + work.featured_image" />
         </figure>
         <h3>{{ work.title }}</h3>
         <h6 span class="work-category">{{ work.work_category.name }}</h6>
      </li>
   </section>
</template>
<!-- org/v2/examples/commits.html -->
<script>
import Axios from 'axios';
// import PortfolioFilter from './PortfolioFilter.vue';
export default {
   data() {
      return {
         selected: '',
         Personal: '',
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
   methods: {
      selectButton: function() {
         this.clicked = !this.clicked;
         console.log(this.clicked);
      }
   },
   // components: {
   //    'app-portfolio-filter': PortfolioFilter
   // },
   computed: {
      filteredByCategory() {
         let filter = new RegExp(this.selected, 'i');
         console.log(filter);
         return this.works.filter(el => el.work_category.name.match(filter));
      }
   },
   created() {
      Axios.get('/test').then(response => this.works = response.data.data);

      //then(response => console.log(response.data));
   }
}
</script>

<style lang="css">
nav ul li {
   cursor: pointer;
}
</style>
