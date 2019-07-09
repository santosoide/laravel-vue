<template>
    <div class="customers">
        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <router-link class="btn btn-secondary"  :to="{ name: 'customers.create' }">Create</router-link>
        </div>
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <div v-if="customers">

            <table class="table table-striped table-hover">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="{ id, email, gender, phone } in customers">
                    <td>{{email}}</td>
                    <td>{{gender}}</td>
                    <td>{{phone}}</td>
                    <td>
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <router-link  class="btn btn-secondary" :to="{ name: 'customers.edit', params: { id } }">Edit</router-link>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" @click="showModal({id, email, gender, phone})">Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary" :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
                <button type="button" class="btn btn-secondary" disabled>{{ paginationCount }}</button>
                <button type="button" class="btn btn-secondary" :disabled="! nextPage" @click.prevent="goToNext">Next</button>
            </div>
        </div>
        <modal v-show="isModalVisible" :customer="selectedCustomer" @close="closeModal" :method="deleteCustomer"></modal>
    </div>
</template>
<script>
    import axios from 'axios';
    import api from '../api/customers';
    const getCustomers = (page, callback) => {
        const params = { page };
        axios
            .get('/api/customers', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {
        data() {
            return {
                renderComponent: true,
                isModalVisible: false,
                customers: null,
                selected: null,
                meta: {
                    current_page: null,
                    last_page: null,
                    to: null,
                    total: null,
                    from: null
                },
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
            };
        },
        computed: {
            nextPage() {
                if (! this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (! this.meta || this.meta.current_page === 1) {
                    return;
                }
                return this.meta.current_page - 1;
            },
            currentPage() {
                return this.meta.current_page;
            },
            paginationCount() {
                if (! this.meta) {
                    return;
                }
                const { current_page, last_page } = this.meta;
                return `${current_page} of ${last_page}`;
            },
            selectedCustomer(){
                return this.selected;
            }
        },
        beforeRouteEnter (to, from, next) {
            getCustomers(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate (to, from, next) {
            this.customers = this.links = this.meta = null;
            getCustomers(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        updated(){
            vm.$forceUpdate();
        },
        methods: {
            showModal(data) {
                this.selected = data;
                this.isModalVisible = true;

            },
            closeModal() {
                this.isModalVisible = false;
            },
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'customers.index',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            goHome() {
                this.$router.push({
                    name: 'customers.index',
                    query: {
                        page: 1,
                    }
                });
            },
            setData(err, data) {

                if (err) {
                    this.error = err.toString();
                } else {
                    console.log(data);
                    this.customers = data.data;
                    this.links = {
                        first: data.first_page_url,
                        next: data.next_page_url,
                        prev: data.prev_page_url,
                        last: data.last_page_url
                    };
                    this.meta = {
                        current_page: data.current_page,
                        last_page: data.last_page,
                        to: data.to_page,
                        total: data.total,
                        from: data.from
                    };
                }
            },
            deleteCustomer(id) {
                api.delete(id).then((response) => {
                    if(response) {
                        this.selected = null;
                        setTimeout(() => this.$router.push({ name: 'customers.index',query: {
                                page: 1,
                            } }), 500);
                    }
                });
            }
        }
    }
</script>