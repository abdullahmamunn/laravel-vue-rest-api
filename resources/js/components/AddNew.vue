<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h2 class="text-center">Add new Article</h2>
                <form v-on:submit.prevent="addArticles()">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input v-model="title" type="text" name="title" placeholder="Enter a Title" class="form-control">
                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                          <input v-model="body" type="text" name="body" placeholder="Enter a Body" class="form-control">
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            
                            <img v-if="articalImage" :src="articalImage" alt="photo" width="200">
                            <input type="file" v-on:change="handelFileObject">
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
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


    export default {
       data(){
           return{
               
                     title : '',
                     body : '',
                     articalImage: ''
      
           }
       },
        methods:{
            handelFileObject(e)
            {
                let image = e.target.files[0]
                let reader = new FileReader
                reader.readAsDataURL(image);
                reader.onload = e =>{
                    // console.log(e);
                  this.articalImage = e.target.result
               }
              
            },
            
          addArticles()
          {
   
             this.axios.post('/api/articals',{title: this.title, body: this.body, image: this.articalImage}).then((result) => {
                this.$router.push({name: 'MainContent'});

             }).catch((err) => {
                  console.log(err);
             });
            
          },
            
        }
    }
</script>
