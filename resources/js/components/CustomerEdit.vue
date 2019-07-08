<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li class="breadcrumb-item" aria-current="page"><router-link :to="{ name: 'customers.index' }">List Customers</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <form @submit.prevent="onSubmit($event)">
            <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputFirstName" v-model="customer.first_name" placeholder="First Name">
                    <span v-if="customer.error" class="text-danger">
                        {{ messages.errors.first_name }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastName" v-model="customer.last_name" placeholder="Last Name">
                    <span v-if="customer.error" class="text-danger">
                        {{ messages.errors.last_name }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" v-model="customer.email" placeholder="Email">
                    <span v-if="customer.error" class="text-danger">
                        {{ messages.errors.email }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="notes" v-model="customer.notes" placeholder="Notes">
                    <span v-if="customer.error" class="text-danger">
                        {{ messages.errors.notes }}
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
    import api from '../api/customers';

    export default {
        data() {
            return {
                customer:{
                    id: null,
                    first_name: "",
                    last_name: "",
                    email: "",
                    notes: "",
                    error: false
                },
                messages: {
                    errors : {
                        first_name: "",
                        last_name: "",
                        email: "",
                        notes: "",
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
                api.update(this.customer.id, this.customer).then((response) => {
                    if(response.data) {
                        this.$router.push({
                            name: 'customers.index'
                        });
                    }
                }).catch(error => {
                    console.log(error.response.data);
                    this.customer.error = true;
                    this.messages.errors = error.response.data.errors;
                });
            }
        },
        created () {
            api.find(this.$route.params.id).then((response) => {
                setTimeout(() => {
                    this.loaded = true;
                    this.customer = response.data;
                }, 500);
            });
        }
    }
</script>