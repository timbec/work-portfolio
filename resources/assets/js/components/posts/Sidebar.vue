<template>
   <ul>
      <h3>Tags:</h3>
     <li v-for="tag in post.tags">
        {{ tag.name }}
     </li>
     <h3>Category</h3>
     <li>
        {{ post.category }}
     </li>
   </ul>
</template>

<script type="text/javascript">
export default {
      props: ['post']
}
</script>
