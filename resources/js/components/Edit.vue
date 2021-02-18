<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="text-center">Edit Article</h2>
                <form @submit.prevent="updateArticles">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="body">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <img :src="image" alt="photo" width="200">
                        
                            <input type="file" v-on:change="handelFileObject">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> </label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                            <router-link to="/" class="btn btn-secondary">Cancel</router-link>
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

               title: '',
               body: '',
               image: ''
                
            }
        },
        created() {
            this.axios
                .get(`/api/articals/${this.$route.params.id}`)
                .then((response) => {
                    // console.log(response.data.title)
                    this.title = response.data.title;
                    this.body = response.data.body;
                    this.image = response.data.image;
                });
        },
        methods:{
            handelFileObject(e)
            {
                let image = e.target.files[0]
                let reader = new FileReader
                reader.readAsDataURL(image);
                reader.onload = e =>{
                    // console.log(e);
                  this.image = e.target.result
                }
            },
            updateArticles() {
               
                this.axios
                    .put(`/api/articals/${this.$route.params.id}`,{title: this.title, body:this.body, image:this.image})
                    .then(response => (
                        
                        this.$router.push({name: 'MainContent'},this.$swal('Success!', 'Data Updated Successfully', 'OK'))
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
