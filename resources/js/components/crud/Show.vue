<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <router-link :to='{name:"createCrud"}' class="btn btn-success">ADD NEW</router-link>
            </div>
            <router-view></router-view> 
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#id</th>
                            <th>#UID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="data in crudExample" :key="data.id">
                            <td>{{data.id}}</td>
                            <td>{{data.UUID}}</td>
                            <td>{{data.name}}</td>
                            <td>{{data.description}}</td>
                            <td>{{data.code}}</td>
                            <td>{{data.status}}</td>
                            <td>
                                <!--<router-link :to='{name:"editCrud" , params:{id:data.id}}' class="btn btn-info">Edit</router-link>-->
                                <button class="btn btn-info" @click="showPopup = true; showCrudPOp(data.id);">Edit</button>
                                <a type="button" @click="deleteRow(data.id)" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <div class="col-12 col-md-6 col-lg-2">
                                    
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div v-if="showPopup" class="popup-overlay" @click="closePopup">
            <div class="popup-content" @click.stop>
                <h2>Popup Title</h2>
                <p>This is a simple popup/modal.</p>
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
                </div>
                <button @click="updateCrud" class="btn btn-primary">Save</button>
                <button @click="closePopup" class="btn btn-danger">Close</button>
            </div>
        </div>
    </div>
    
</template>
<script>

import axios from 'axios';

export default {
    
    name:"crudExample",
    data(){
        return{
            crudExample:[],
            showPopup: false,
            crud:{
                UUID:"",
                name:"",
                description:"",
                code:"",
                status:""
            },
            id:"",
        }
    },
    mounted(){
        this.showCrud()
    },
    methods:{
        async showCrud(){
            await axios.get('api/crud').then(response=>{
                    this.crudExample = response.data
                }).catch(error=>{
                    this.crudExample = []
                })
        },
        deleteRow(id){
            if(confirm("Are you sure to delete the row?")){
                axios.delete(`api/crud/${id}`).then(response=>{
                    this.showCrud()
                }).catch(error=>{
                    this.crudExample = [];
                })
            }
        },
        closePopup() {
            this.showPopup = false; // Close the popup
        },
        async showCrudPOp(id){
            await axios.get(`/api/crud/${id}`).then(response=>{
                const { UUID, name,description,code, status } = response.data;
                    this.crud.UUID = UUID;
                    this.crud.name = name;
                    this.crud.description = description;
                    this.crud.code = code;
                    this.crud.status = status;
                    this.id = id;
                })
                .catch(error=>{
                    console.log(error)
                })
        },
        async updateCrud(){
            await axios.put(`/api/crud/${this.id}`,this.crud).then(response=>{
                this.$router.push({name:"showCrud"})
                this.closePopup()
                this.showCrud()
            }).catch(error=>{
                console.log(error);
            })
            
        }
        
    }
}

</script>



<style scoped>
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.popup-content {
  background: white;
  padding: 20px;
  border-radius: 5px;
  width: 700px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}



</style>

