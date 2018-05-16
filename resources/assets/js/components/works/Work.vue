 <template lang="html">
  <article class="">
     <h4>
        <router-link to="/projects">
         Back to main projects page:
        </router-link>
     </h4>
     <h1>{{ work.title }}</h1>
  </article>
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
         }
      }
   },
   created: function() {
      var self = this;
      Axios.get('/works/' + this.$route.params.slug).then(function(response) {
         self.work = response.data;
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
