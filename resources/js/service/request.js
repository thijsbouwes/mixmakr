import axios from "axios/index";
import { ENDPOINTS, HTTP_CODES } from "../config/api";
import { router } from '../router';
import Auth from "./auth-service";

// Add a request interceptor, to add token
axios.interceptors.request.use(config => {
    let token = Auth.getToken();
    if (token) {
        config.headers.common['Authorization'] = token;
    }

    return config;
});

// Add a response interceptor, to check response on auth
axios.interceptors.response.use(null, (error) => {
    let originalRequest = error.config;

    if (error.response.status === HTTP_CODES.UNAUTHORIZED && !originalRequest._retry && originalRequest.url !== ENDPOINTS.BASE + ENDPOINTS.LOGIN_REFRESH) {
        console.warn("Access Token expired");
        originalRequest._retry = true;

        return Auth.refreshToken()
            .then(data => {
                // retry request, with new token
                Auth.resetAuthRefreshTokenRequest();
                originalRequest.headers['Authorization'] = Auth.getToken();
                return axios(originalRequest);
            })
            .catch(error => {
                Auth.logout();
                router.push('/login');
                console.warn(error);
            });
    }

    return Promise.reject(error);
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// Setup base url
axios.defaults.baseURL = ENDPOINTS.BASE;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default axios;

