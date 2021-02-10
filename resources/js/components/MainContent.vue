<template>

       <div class="container">
           <div class="row justify-content-center mt-5">
               <div class="col-md-8">
                 <h2 class="text-center">All Articles</h2>
                   <table class="table table-bordered">
                       <thead>
                       <tr>
                           <th>Sl</th>
                           <th>title</th>
                           <th>body</th>
                           <th>action</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr v-for="(article,i) in articles.data" :key="article.id">
                           <td>{{++i}}</td>
                           <td>{{article.title}}</td>
                           <td>{{article.body}}</td>
                           <td>
                               <router-link :to="{name:'edit', params:{id : article.id}}" class="btn btn-primary"> Edit</router-link>
                               <button class="btn btn-danger" @click="deleteData(article.id)">Delete</button>
                           </td>
                       </tr>
                       </tbody>
                   </table>
                   <pagination :data="articles" @pagination-change-page="getResults" class="mt-1 float-right"></pagination>
               </div>

           </div>
       </div>

</template>

<script>
    export default {
       data(){
           return{
              articles: []
           }
       },
        created() {
            this.axios
                .get('http://localhost:8000/api/articals')
                .then(response => {
                    // console.log(response.data);
                    this.articles = response.data;
                });
        },
        methods:{
            getResults(page = 1) {
                axios.get('http://localhost:8000/api/articals?page=' + page)
                    .then(response => {
                        this.articles = response.data;
                    });
            },
            deleteData(id){
               this.axios
                .delete(`http://localhost:8000/api/articals/${id}`)
                .then(response=>{
                    let i = this.articles.map(item => item.id).indexOf(id); // find index of your object
                    this.articles.splice(i, 1)
                });
            }
        },
        mounted() {
            // Fetch initial results
            this.getResults();
        },
    }
</script>
