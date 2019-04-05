export const ENDPOINTS = {
    BASE: process.env.MIX_API_URL,
    LOGIN: 'oauth/token',
    REGISTER: 'user/register',
    LOGIN_REFRESH: 'oauth/token',
    PRODUCTS: 'products',
    USER: 'user'
};

export const HTTP_CODES = {
    UNAUTHORIZED: 401
};