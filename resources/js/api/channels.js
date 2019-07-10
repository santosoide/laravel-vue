import axios from 'axios';

export default {
    all() {
        return axios.get('/api/channels');
    },
    create(data) {
        return axios.post(`/api/channels`, data);
    },
    find(id) {
        return axios.get(`/api/channels/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/channels/${id}`, data);
    },
    delete(id) {
        return axios.delete(`/api/channels/${id}`);
    },
};