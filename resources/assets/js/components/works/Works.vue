<template lang="html">
   <section>
        <h1>Projects</h1>
        <li v-for="work in works">
           <router-link :to="/projects/ + work.slug">
           {{ work.title }}
           </router-link>
        </li>
   </section>
</template>

<script>
import Axios from 'axios';


export default {
   data: function() {
         return {
               works: [],
               work: {
                  title: '',
                  body: '',
                  slug: '',
                  excerpt: '',
                  category: {
                     name: ''
                  },
                  tags: [],
                  tag: {
                     name: ''
                  },
                  featured_image: '',
                  thumbnail: ''
               }
         }
      },
      computed: {
         thumbnail: function() {
            thumbnail = '/images/' + this.featured_image;
            return thumbnail;
         }
      },
       created() {
           Axios.get('/works').then(response => this.works = response.data.data);

           //then(response => console.log(response.data.data));
       }
}

</script>

<style lang="css">
</style>
