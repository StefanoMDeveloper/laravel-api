<template>
    <main>
        <router-view>

        </router-view>
    </main>
</template>

<script>
export default {
    name: "Main",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts: function () {
            axios.get("/api/posts").then((response) => {
                this.posts = response.data;
            });
        },
    },
};
</script>

<style lang="scss" scoped>
.post-container {
    margin-top: 100px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    .post-card {
        border: 1px solid black;
        width: 30%;
        margin: 10px auto;
        display: flex;
        flex-direction: column;
        text-align: center;
        img {
            height: 100px;
            width: auto;
        }
    }
}
</style>