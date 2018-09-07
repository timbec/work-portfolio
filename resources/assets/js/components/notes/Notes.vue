<template lang="html">
   <section>
        <h1>Notes</h1>
        <li v-for="note in notes">
           <router-link :to="/work-notes/ + note.slug">
           <figure>
           <img :src="'images/' + note.featured_image" />
           <figcaption>
           {{ note.title }}
           </figcaption>
           </figure>
           </router-link>
           <ul>
               <li v-for="tag in note.keywords">
                   {{ tag }}
                </li>
           </ul>
        </li>
   </section>
</template>

<script>
import Axios from 'axios';


export default {
   data: function() {
         return {
               notes: [],
               note: {
                  title: '',
                  body: '',
                  slug: '',
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
           Axios.get('/notes').then(response => this.notes = response.data.data);

           //then(response => console.log(response.data.data));
       }
}

</script>

<style lang="css">
</style>
