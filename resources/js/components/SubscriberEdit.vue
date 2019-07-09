<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li class="breadcrumb-item" aria-current="page"><router-link :to="{ name: 'subscribers.index' }">List Subscribers</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <form @submit.prevent="onSubmit($event)">
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail" v-model="subscriber.email" placeholder="Email">
                    <span v-if="subscriber.error" class="text-danger">
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
    import api from '../api/subscribers';

    export default {
        data() {
            return {
                subscriber:{
                    id: null,
                    email: "",
                    error: false
                },
                messages: {
                    errors : {
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
                api.update(this.subscriber.id, this.subscriber).then((response) => {
                    if(response.data) {
                        this.$router.push({
                            name: 'subscribers.index'
                        });
                    }
                }).catch(error => {
                    console.log(error.response.data);
                    this.subscriber.error = true;
                    this.messages.errors = error.response.data.errors;
                });
            }
        },
        created () {
            api.find(this.$route.params.id).then((response) => {
                setTimeout(() => {
                    this.loaded = true;
                    this.subscriber = response.data;
                }, 500);
            });
        }
    }
</script>