import Home from './components/pages/Home.vue';
import Posts from './components/posts/Posts.vue';
import Post from './components/posts/Post.vue';

export const routes = [
   {
        path: '/',
        component: Home

   },
   {
        path: '/blog',
        component: Posts
    },
    {
        path: '/blog/:slug',
        component: Post
    }
];
