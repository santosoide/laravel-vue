import axios from 'axios';

export default {
    all() {
        return axios.get('/api/categories');
    },
    create(data) {
        return axios.post(`/api/categories`, data);
    },
    find(id) {
        return axios.get(`/api/categories/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/categories/${id}`, data);
    },
    delete(id) {
        return axios.delete(`/api/categories/${id}`);
    },
};