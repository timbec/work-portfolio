<template>
    <div class="popup" id="content">
        <article class="popup__content">
            <a class="close" href="">&times;</a>
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
</template>

<script>
export default {
    props: ['note', 'tag'],
}
</script>
