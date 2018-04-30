<template lang="html">
   <section>
      <h3>Posts Page</h3>
      <li v-for="post in posts">
      <figure>
         <img :src="'/images/' + post.featured_image" />
      </figure>
       <h3>
          <router-link :to="/blog/ + post.slug">
          {{ post.title }}
          </router-link>

       </h3>
       <p v-html="post.excerpt"></p>
       <p v-if="post.category">
          Category: {{ post.category.name }}
       </p>
      <ul v-if="post.tags">

         <li v-for="tag in post.tags">
             {{ tag.name }}
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
               posts: [],
               post: {
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
           Axios.get('/posts').then(response => this.posts = response.data.data);

           //then(response => console.log(response.data.data));
       }
}

</script>

<style lang="css">
</style>
