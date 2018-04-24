<template lang="html">
   <section>
      <h3>Posts Page</h3>
      <li v-for="post in posts">
       <h3>
          <router-link :to="/blog/ + post.slug">
          {{ post.title }}
          </router-link>
          <img :src="post.photo_id" alt="">
       </h3>
       <p v-html="post.excerpt"></p>
    </li>
   </section>

</template>

<script>
import Axios from 'axios';
import VueMarkdown from 'vue-markdown';
// window.axios = require('axios');
//
// window.axios.defaults.headers.common = {
//     'X-Requested-With': 'XMLHttpRequest'
// };

//

export default {
   data() {
         return {
               posts: [],
               post: {
                  title: '',
                  body: '',
                  slug: '',
                  photo_id: ''
               }
         }
      },
    components: {
        VueMarkdown
    },
    created() {
        Axios.get('/posts').then(response => this.posts = response.data);

        //then(response => console.log(response.data));
    }
}

</script>

<style lang="css">
</style>
