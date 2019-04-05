import { ENDPOINTS } from '../config/api';
import request from './request';
import moment from 'moment';

let authRefreshTokenRequest;

class AuthService {
    login(email, password) {
        let data = {username: email, password, grant_type: 'password'};

        // Login
        return request.post(ENDPOINTS.LOGIN, data)
            .then(response => {
                this.updateTokens(response.data);
                return Promise.resolve(response);
            })
            .catch(error => {
                return Promise.reject(error);
            });
    }

    register(name, email, password, password_confirmation) {
        let data = {name, email, password, password_confirmation};

        // Register
        return request.post(ENDPOINTS.REGISTER, data)
            .then(response => {
                return Promise.resolve(response);
            })
            .catch(error => {
                return Promise.reject(error);
            });
    }

    requestRefreshToken() {
        let data = {refresh_token: this.getRefreshToken(), grant_type: 'refresh_token'};

        // Get refresh token
        return request.post(ENDPOINTS.LOGIN_REFRESH, data)
            .then(response => {
                this.updateTokens(response.data);
                return Promise.resolve(response);
            })
            .catch(error => {
                return Promise.reject(new Error('Refresh and Access Tokens have expired'));
            });
    }

    // Check if we are already making a token refresh request
    refreshToken() {
        if (!authRefreshTokenRequest) {
            authRefreshTokenRequest = this.requestRefreshToken();
            return authRefreshTokenRequest;
        }

        return authRefreshTokenRequest;
    }

    // Reset auth refresh request
    resetAuthRefreshTokenRequest() {
        authRefreshTokenRequest = null;
    }

    isLoggedIn() {
        let is_expired = moment().isSameOrBefore(localStorage.getItem('token_expires_in'));

        return Boolean(localStorage.getItem('token')) && is_expired;
    }

    logout() {
        localStorage.removeItem('token');
        localStorage.removeItem('token_expires_in');
        localStorage.removeItem('refresh_token');
    }

    updateTokens(data) {
        localStorage.setItem('token', data.access_token);
        let refresh_token_expires_in = data.expires_in * 2;
        localStorage.setItem('token_expires_in', moment().add(refresh_token_expires_in, 'seconds').format());
        localStorage.setItem('refresh_token', data.refresh_token);
    }

    getToken() {
        return "Bearer " + localStorage.getItem('token');
    }

    getRefreshToken() {
        return localStorage.getItem('refresh_token');
    }
}

export default new AuthService();