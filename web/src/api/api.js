import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost/quizometro/server'
});

axios.defaults.headers.common['Content-Type'] ='application/json;charset=utf-8';
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axios.defaults.headers.common['Access-Control-Allow-Headers'] = '*';
axios.defaults.headers.common['Access-Control-Allow-Methods'] = 'POST, GET, OPTIONS, PUT, DELETE';

api.interceptors.request.use(async config => {
    if(localStorage.token) {
        config.headers.Authorization = localStorage.token;
    }

    return config;
})

export default api;