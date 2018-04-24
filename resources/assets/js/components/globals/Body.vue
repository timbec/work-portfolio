<template lang="html">
<section id="main-content">
    <h2>Posts</h2>
   <li v-for="post in posts">
       <h3>{{ post.title }}</h3>
       <vue-markdown>{{post.body}}</vue-markdown>
       <vue-markdown>{{post.description}}</vue-markdown>
    </li>
</section>
</template>

<script>
import Axios from 'axios';
import VueMarkdown from 'vue-markdown';
window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

var MarkdownIt = require('markdown-it'),
    md = new MarkdownIt();

    console.log(md);

export default {
    data() {
        return {
            posts: [], 
            works: []
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