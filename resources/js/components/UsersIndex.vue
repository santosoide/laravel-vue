<template>
    <div class="users">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>

        <ul v-if="users">
            <li v-for="{ id, name, email } in users">
                <strong>Name:</strong> {{ name }},
                <strong>Email:</strong> {{ email }}
            </li>
        </ul>

        <div class="pagination">
            <button :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
            {{ paginationCount }}
            <button :disabled="! nextPage" @click.prevent="goToNext">Next</button>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    const getUsers = (page, callback) => {
        const params = { page };
        axios
            .get('/api/users', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {
        data() {
            return {
                users: null,
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
            paginationCount() {
                if (! this.meta) {
                    return;
                }
                const { current_page, last_page } = this.meta;
                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter (to, from, next) {
            getUsers(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate (to, from, next) {
            this.users = this.links = this.meta = null;
            getUsers(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'users.index',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, data) {
                console.log(data);
                if (err) {
                    this.error = err.toString();
                } else {
                    this.users = data.data;
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
        }
    }
</script>