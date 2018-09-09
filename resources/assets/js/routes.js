import Home from './components/pages/Home.vue';
import About from './components/pages/About.vue';
import Contact from './components/pages/Contact.vue';
import Test from './components/pages/Test.vue';
import Posts from './components/posts/Posts.vue';
import Post from './components/posts/Post.vue';
import Works from './components/works/Works.vue';
import Work from './components/works/Work.vue';
import Notes from './components/notes/Notes.vue';
import Note from './components/notes/Note.vue';

console.log(Notes); 
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
        path: '/work-notes',
        component: Notes
    },
    {
        path: '/work-notes/:slug',
        component: Note
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
