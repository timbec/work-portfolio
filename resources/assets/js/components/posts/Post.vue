<template lang="html">
<section id="blog-content">
   <article class="">
      <h1>{{ post.title }}</h1>
      <div v-html="trimHtml"></div>
   </article>
   <!-- <aside>
       <ul>
           <h3>Tagged Under: </h3>
        <li v-for="tag in post.tags">
            {{ tag.name }}
        </li>
            <h3>Category</h3>
            {{ post.category }}
        </ul>
   </aside> -->
   <aside class="">
      <app-sidebar
      :post="post"
      ></app-sidebar>
   </aside>
</section><!--#section-->
</template>

<script>
import Axios from 'axios';
import SideBar from './Sidebar.vue';

// Might be able to use this in computed somehow: https://stackoverflow.com/questions/29537944/how-to-get-the-plain-text-from-summernote-editor
//
export default {
   data: function() {
      return {
         posts: [],
         post: {
            title: '',
            body: '',
            tags: [],
            tag: [],
            category:''
         },
         servers: [
                  { id: 1, status: 'Normal'},
                  { id: 2, status: 'Critical'},
                  { id: 3, status: 'Unknown'},
                  { id: 4, status: 'Normal'}
              ]
      }
   },
   computed: {
      // This doesn't work but shows what possibly could be done.
      trimHtml() {
         return this.post.body.replace(/&nbsp;|<br>/g, ' ');
      }
   },
   components: {
       'app-sidebar' : SideBar
   },
   created: function() {
      var self = this;
      Axios.get('/posts/' + this.$route.params.slug).then(function(response) {
         self.post = response.data.data;
         console.log(self.post);
      })
      .catch( error => {
         alert('There was an error in your request');
         console.error(error.response.data.message);
      });
   }
}
</script>

<style lang="css">
</style>
