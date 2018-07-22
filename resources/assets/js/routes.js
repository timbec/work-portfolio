import Home from './components/pages/Home.vue';
import About from './components/pages/About.vue';
import Contact from './components/pages/Contact.vue';
import Test from './components/pages/Test.vue';
import Posts from './components/posts/Posts.vue';
import Post from './components/posts/Post.vue';
import Works from './components/works/Works.vue';
import Work from './components/works/Work.vue';


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
        path: '/projects',
        component: Works
    },
   {
        path: '/projects/:slug',
        component: Work
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
