<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li class="breadcrumb-item" aria-current="page"><router-link :to="{ name: 'categories.index' }">List Categories</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Create Categories</li>
            </ol>
        </nav>
        <form @submit.prevent="onSubmit($event)">
            <div class="form-group row">
                <label for="inputPosition" class="col-sm-3 col-form-label">Position</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPosition" v-model="category.position" placeholder="Position">
                    <span v-if="category.error" class="text-danger">
                        {{ messages.errors.position }}
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputImage" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputImage" v-model="category.image" placeholder="Image">
                    <span v-if="category.error" class="text-danger">
                        {{ messages.errors.image }}
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
    import api from '../api/categories';

    export default {
        data() {
            return {
                category:{
                    position: "",
                    image: "",
                    error: false
                },
                messages: {
                    errors : {
                        position: "",
                        image: "",
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
                api.create(this.category).then((response) => {
                    if(response.data) {
                        this.$router.push({
                            name: 'categories.index'
                        });
                    }
                    console.log(response);
                }).catch(error => {
                    console.log(error.response.data);
                    this.category.error = true;
                    this.messages.errors = error.response.data.errors;
                });
            }
        },
        created () {

        }
    }
</script>