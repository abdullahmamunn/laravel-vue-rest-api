<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="text-center">Add new Article</h2>
                <form v-on:submit.prevent="addArticles()">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" v-model="articles.title" class="form-control" placeholder="Enter a Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                            <input type="text" v-model="articles.body" class="form-control" id="inputPassword3" placeholder="Body">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> </label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
           return{
               articles:{}
           }
       },
        methods:{
            addArticles() {

                this.axios
                    .post('http://localhost:8000/api/articals', this.articles)
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
