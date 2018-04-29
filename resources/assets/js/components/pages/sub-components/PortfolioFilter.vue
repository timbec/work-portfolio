<template lang="html">
      <ul>
         <h3>Da Filter</h3>
         <li v-on:click="SelectButton">All</li>
         <li v-on:click="SelectButton">Personal</li>
         <li v-on:click="SelectButton">Client</li>
         <li v-on:click="SelectButton">Agency</li>

      </ul>
</template>

<script>
import Axios from 'axios';
export default {
   data() {
      return {
         workCategories: [],
         workCategory: {
            name: ''
         }
      }
   },
   methods: {
      selectButton() {
         this.clicked = !this.clicked;
         console.log(this.clicked);
      }
   },
   created() {

   }
}
</script>

<style lang="css">
</style>
