<template lang="html">
   <article class="">
      <h1>{{ post.title }}</h1>
      <p v-html="post.body"></p>
   </article>
</template>

<script>
import Axios from 'axios';


export default {
   data: function() {
      return {
         posts: [],
         post: {
            title: '',
            body: ''
         }
      }
   },
   created: function() {
      var self = this;
      Axios.get('/posts/' + this.$route.params.slug).then(function(response) {
         self.post = response.data;
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
