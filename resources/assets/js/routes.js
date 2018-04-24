import Posts from './components/posts/Posts.vue';
import Post from './components/posts/Post.vue';

export const routes = [{
        path: '/blog',
        component: Posts
    },
    {
        path: '/blog/:slug',
        component: Post
    }
];
