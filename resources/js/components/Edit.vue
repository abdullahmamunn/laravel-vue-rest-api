<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="text-center">Edit Article</h2>
                <form @submit.prevent="updateArticles">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="article.title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="article.body">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> </label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                article: {},
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/articals/${this.$route.params.id}`)
                .then((response) => {
                    this.article = response.data;
                });
        },
        methods:{
            updateArticles() {

                this.axios
                    .put(`http://localhost:8000/api/articals/${this.$route.params.id}`, this.article)
                    .then(response => (
                        this.$router.push({name: 'MainContent'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
