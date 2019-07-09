<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li class="breadcrumb-item" aria-current="page"><router-link :to="{ name: 'roles.index' }">List Roles</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Create Role</li>
            </ol>
        </nav>
        <form @submit.prevent="onSubmit($event)">
            <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" v-model="role.name" placeholder="Name">
                    <span v-if="role.error" class="text-danger">
                        {{ messages.errors.name }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPermission" class="col-sm-3 col-form-label">Permission</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPermission" v-model="role.permission_type" placeholder="Permission">
                    <span v-if="role.error" class="text-danger">
                        {{ messages.errors.permission_type }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import api from '../api/roles';

    export default {
        data() {
            return {
                role:{
                    name: "",
                    permission_type: "",
                    error: false
                },
                messages: {
                    errors : {
                        name: "",
                        permission_type: "",
                    }
                },
                loaded: false,
                saving: false
            }
        },
        computed: {

        },
        methods: {
            onSubmit (event) {
                api.create(this.role).then((response) => {
                    if(response.data) {
                        this.$router.push({
                            name: 'roles.index'
                        });
                    }
                    console.log(response);
                }).catch(error => {
                    console.log(error.response.data);
                    this.role.error = true;
                    this.messages.errors = error.response.data.errors;
                });
            }
        },
        created () {

        }
    }
</script>