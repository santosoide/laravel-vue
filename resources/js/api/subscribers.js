import axios from 'axios';

export default {
    all() {
        return axios.get('/api/subscribers');
    },
    create(data) {
        return axios.post(`/api/subscribers`, data);
    },
    find(id) {
        return axios.get(`/api/subscribers/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/subscribers/${id}`, data);
    },
    delete(id) {
        return axios.delete(`/api/subscribers/${id}`);
    },
};