<template>

       <div class="container">
           <div class="row justify-content-center mt-5">
               <div class="col-md-8">
                 <h2 class="text-center">All Articles</h2>
                   <table class="table table-bordered">
                       <thead>
                       <tr>
                           <th>Sl</th>
                           <th>ID</th>
                           <th>title</th>
                           <th>image</th>
                           <th>body</th>
                
                           <th>action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr v-for="(article,i) in articles.data" :key="article.id">
                           <td>{{++i}}</td>
                           <td>{{article.id}}</td>
                           <td>{{article.title}}</td>
                           <td>
                               <img :src="article.image" alt="photo" width="100">
                           </td>
                           <td>{{article.body}}</td>
                        
                           <td>
                               <router-link :to="{name:'edit', params:{id : article.id}}" class="btn btn-success"> Edit</router-link>
                               <button class="btn btn-danger" @click="deleteData(article.id)">Delete</button>
                           </td>
                       </tr>
                       </tbody>
                   </table>
                   <pagination
                       :data="articles"
                       @pagination-change-page="getResults"
                       class="mt-1 float-right">
                   </pagination>
               </div>

           </div>
       </div>

</template>

<script>

    export default {
       data(){
           return{
              
                articles: {},
                page: 1
           }
       },
        created() {
            this.axios
                .get('/api/articals')
                .then(response => {
                    this.articles = response.data;
                });
        },
        methods:{
            getResults(page = 1) {
                this.page = page;
                axios.get('/api/articals?page=' + page)
                    .then(response => {
                        this.articles = response.data;
                    });
            },
            deleteData(id){
                this.$swal({
                    title: 'Are you sure?',
                    text: 'You can\'t revert your action',
                    type: 'warning',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes Delete it!',
                    cancelButtonText: 'No, Keep it!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => { // <--
                    if (result.value) { // <-- if confirmed
                        this.axios
                            .delete(`api/articals/${id}`)
                            .then(response => {
                                this.getResults(this.page);
                            });
                        this.$swal('Deleted!', 'Your file has been deleted.', 'success')
                    }
                    else{
                        this.$swal('Cancelled', 'Your imaginary file is safe :)', 'error')
                    }
                });

            }
        },

    }
</script>
