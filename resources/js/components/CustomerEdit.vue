<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li class="breadcrumb-item" aria-current="page"><router-link :to="{ name: 'users.index' }">List Users</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <form @submit.prevent="onSubmit($event)">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" v-model="user.name" placeholder="Name">
                    <span v-if="user.error" class="text-danger">
                        {{ messages.errors.name }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" v-model="user.email" placeholder="Email">
                    <span v-if="user.error" class="text-danger">
                        {{ messages.errors.email }}
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
    import api from '../api/users';

    export default {
        data() {
            return {
                user:{
                    id: null,
                    name: "",
                    email: "",
                    error: false
                },
                messages: {
                    errors : {
                        name: "",
                        email: "",
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
                api.update(this.user.id, this.user).then((response) => {
                    if(response.data) {
                        this.$router.push({
                            name: 'users.index'
                        });
                    }
                }).catch(error => {
                    console.log(error.response.data);
                    this.user.error = true;
                    this.messages.errors = error.response.data.errors;
                });
            }
        },
        created () {
            api.find(this.$route.params.id).then((response) => {
                setTimeout(() => {
                    this.loaded = true;
                    this.user = response.data;
                }, 500);
            });
        }
    }
</script>