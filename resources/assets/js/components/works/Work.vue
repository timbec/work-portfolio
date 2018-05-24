 <template lang="html">
 <section id="work-content">
    <h1>{{ work.title }}</h1>
  <article class="main-content">
     <div class="entry-content" v-html="work.body">
     </div><!--.entry-content-->
  </article>
  <aside class="work-sidebar">
    <p v-html="work.description"></p>
    <ul>
      <li>
        <ul>
          <h5>Tagged Under:</h5>
          <li v-for="tag in work.tags">
            {{ tag.name }}
          </li>
        </ul>
      </li>
      <li>
       <h5>Category: {{ work.work_category}}</h5>
      </li>

      <li>
        <a target="_blank" :href="work.website_link">Live Website</a>
      </li>
      <li>
          <h4>
          <router-link to="/projects">
          Back to main projects page:
          </router-link>
          </h4>
      </li>
    </ul>
  </aside>
</section>
</template>

<script>
import Axios from 'axios';
export default {
   data: function() {
      return {
         works: [],
         work: {
            title: '',
            body: ''
         },
         tags: [], 
         tag: ''
      }
   },
   created: function() {
      var self = this;
      Axios.get('/works/' + this.$route.params.slug).then(function(response) {
         self.work = response.data.data;
         console.log(self.work);
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
