<template>
    <div class="container">
        <h1>{{post.title}}</h1>
        <div v-html="post.content"></div>
        <p v-if="post.category"><strong>Categoria:</strong> {{post.category.name}}</p>
        <div v-if="post.tags.length > 0">
            <strong>Tags</strong>
            <ul>
                <li v-for="tag in post.tags" :key="tag.id">
                    {{tag.name}}
                </li>
            </ul>
        </div>
        <img v-if="post.image" :src="`/storage/${post.image}`" :alt="`/public/img/empty-image.jpg`">
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return{
            post: {}
        }
    },
    created() {
        axios
        .get(`/api/posts/${this.route.params.slug}`)
        .then((response) => {
            this.post = response.data;
        })
    }
}
</script>

<style>

</style>