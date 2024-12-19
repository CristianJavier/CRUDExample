<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Row</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updateCrud">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>UUID</label>
                                    <input type="text" class="form-control" v-model="crud.UUID">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="crud.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" v-model="crud.description"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" v-model="crud.code">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" v-model="crud.status">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</template>
<script>


import axios from 'axios';

export default {
    name: "update-crud",
    data(){
        return{
            crud:{
                UUID:"",
                name:"",
                description:"",
                code:"",
                status:""
            },
            id:this.$route.params.id
        }
    },
    mounted(){
        this.showCrud()
    },
    methods:{
        async showCrud(){
            await axios.get(`/api/crud/${this.id}`).then(response=>{
                console.log(this.id);
                    const { UUID, name,description,code, status } = response.data;
                    console.log(this.UUID);
                    this.crud.UUID = UUID;
                    this.crud.name = name;
                    this.crud.description = description;
                    this.crud.code = code;
                    this.crud.status = status;
                })
                .catch(error=>{
                    console.log(error)
                })
        },
        async updateCrud(){
            await axios.put(`/api/crud/${this.id}`,this.crud).then(response=>{
                this.$router.push({name:"showCrud"})
            }).catch(error=>{
                console.log(error);
            })
            
        }
    }
}
</script>
