<template lang="html">
   <section class="notes">
        <h1>Notes</h1>
         <div class="search-wrapper">
            <input type="text" v-model="search" placeholder="Search title.."/>
                <label>Search title:</label>
            </div>
        <ul>
        <li v-for="note in filteredList">
            <!-- <router-link :to="/work-notes/ + '#' + note.slug"> -->
            <a :href="'#' + note.slug">
            <figure class="notes__image">
            <img :src="'images/' + note.featured_image" />
            <figcaption class="notes__caption">
            {{ note.title }}
            </figcaption>
            </figure>
            </a>
           <!-- </router-link> -->
           <!-- <a :href="'#' + note.slug">Click for Note</a> -->
           <ul class="notes__tags">
               <li v-for="tag in note.keywords">
                   {{ tag }}
                </li>
           </ul>
           <div class="popup" :id="note.slug">
            <article class="popup__content">
                <a class="popup__close" href="/work-notes">&times;</a>
                <h1>{{ note.title }}</h1>
                <p v-html="note.body"></p>
                <ul>
                    <h4>Uses: </h4>
                    <li v-for="tag in note.keywords">
                        {{ tag }}
                        </li>
                </ul>
            </article>
        </div><!--.popup-->
        </li>
        </ul>
   </section>
</template>

<script>
import Axios from 'axios';
import Note from './Note.vue';


export default {
   data: function() {
         return {
               search: '',
               notes: [],
               note: {
                  title: '',
                  body: '',
                  slug: '',
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
         }, 
        filteredList() {
            return this.notes.filter(note => {
                return note.title.toLowerCase().includes(this.search.toLowerCase())
            })
        }
      },
      components: {
          'app-note': Note
      }, 
       created() {
           Axios.get('/notes').then(response => this.notes = response.data.data);

           //then(response => console.log(response.data.data));
       }
}

</script>

<style lang="css">
</style>
