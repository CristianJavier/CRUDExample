<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Row</h4>

                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="createCrud">
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
                                    <label for="options">Status</label>
                                    <select v-model="crud.status" id="options" class="form-select">
                                        <option disabled value="">Select...</option>
                                        <option v-for="option in options" :key="option" :value="option">{{ option }}</option>
                                    </select>
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
    name: "create-crud",
    data(){
        return{
            crud:{
                UUID:"",
                name:"",
                description:"",
                code:"",
                status:""
            },
            options: ['Active', 'Inactive']
        }
    },
    methods:{
        async createCrud(){
            await axios.post('api/crud',this.crud).then(response=>{
                this.$router.push({name:"showCrud"})
            }).catch(error=>{
                console.log(error);
            })
            
        }
    }
}
</script>
