import axios from 'axios';

export default {
    all() {
        return axios.get('/api/roles');
    },
    create(data) {
        return axios.post(`/api/roles`, data);
    },
    find(id) {
        return axios.get(`/api/roles/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/roles/${id}`, data);
    },
    delete(id) {
        return axios.delete(`/api/roles/${id}`);
    },
};