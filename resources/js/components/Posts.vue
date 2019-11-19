<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        Posts
                    </div>

                    <div class="card-body">
                    <form @submit.prevent="addPost">

                        <div class="form-group">
                          <input class="form-control" placeholder="Title" v-model="post.title">
                        </div>

                        <div class="form-group">
                          <input class="form-control" placeholder="Description" v-model="post.description">
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>

                    </form>
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts" v-bind:key="post.id">
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.description }}</td>
                                    <td>
                                        <button @click="editPost(post)" class="btn btn-warning btn-sm"href="#">Edit</button>
                                        <button @click="deletePost(post.id)" class="btn btn-danger btn-sm"href="#">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
        posts: [],
        post:{
            id:'',
            title:'',
            description:''
          },
          id:'',
          pagination: {},
          edit:false
      };
    },

    created(){
        this.fetchPosts();
    },

    methods: {
        fetchPosts(page_url) {
            let vm = this;
            page_url = page_url || '/api/posts';
            fetch('api/posts')
            .then(res => res.json())
            .then(res=> {
                this.posts = res.data;
                vm.makePagination(res.meta, res.links); 
            })
            .catch(err => console.log(err));
        },
        makePagination(meta, links){
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };
            this.pagination = pagination;
        },
        
        deletePost(id){
            if(confirm('Are you sure?')){
                fetch(`api/post/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    this.fetchPosts();
                })
            }
        },

        addPost() {
            if(this.edit === false) {
                fetch('api/post', {
                    method: 'post',
                    body: JSON.stringify(this.post),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.post.title = '';
                    this.post.description = '';
                    this.fetchPosts();
                })
                .catch(err => console.log(err));

            } else {
                // Update
                fetch('api/post', {
                    method: 'put',
                    body: JSON.stringify(this.post),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.post.title = '';
                    this.post.description = '';
                    this.fetchPosts();
                })
                .catch(err => console.log(err));
              }
            },
        editPost(post){
            this.edit = true;
            this.post.id = post.id;
            this.post.id = post.id;
            this.post.title = post.title;
            this.post.description = post.description;
        }

    },



    mounted() {
        console.log("Component mounted.");
    }
};
</script>
