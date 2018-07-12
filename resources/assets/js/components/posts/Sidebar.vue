<template>
   <ul>
      <li>
            <h3>Tags:</h3>
            <div v-for="tag in post.tags">
                  {{ tag.name }}
            </div>
      </li>
      <li>
            <h3>Category</h3>
            <div>
                  {{ post.category }}
            </div>
      </li>
   </ul>
</template>

<script type="text/javascript">
export default {
      props: ['post']
}
</script>
