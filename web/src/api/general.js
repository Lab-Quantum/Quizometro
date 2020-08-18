import api from './api';

export const checkServer = () => (
    api.get('/').then(response => response.data)
)