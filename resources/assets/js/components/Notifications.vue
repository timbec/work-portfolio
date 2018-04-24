<template>
  <div class="notification">
      {{ message }}
  </div>
</template>

<script>
export default {
  data() {
      return {
          message: 'Where the fuck have you been all my life'
      };
  }
}
</script>

<style>
.notification {
    background: #333; 
    color: white; 
}
</style>


