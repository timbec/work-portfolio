import Home from './components/pages/Home.vue';
import About from './components/pages/About.vue';
import Contact from './components/pages/Contact.vue';
import Posts from './components/posts/Posts.vue';
import Post from './components/posts/Post.vue';

export const routes = [
   {
        path: '/',
        component: Home

   },
   {
        path: '/about',
        component: About

   },
   {
        path: '/contact',
        component: Contact

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
