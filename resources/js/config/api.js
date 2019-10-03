export const ENDPOINTS = {
    BASE: process.env.MIX_API_URL,
    LOGIN: 'oauth/token',
    LOGIN_REFRESH: 'oauth/token',
    REGISTER: 'users',
    POPULAR_PRODUCTS: 'popular-drinks',
    DRINKS: 'drinks',
    INGREDIENTS: 'ingredients',
    ORDERS: 'orders',
    USER: 'users/self'
};

export const HTTP_CODES = {
    UNAUTHORIZED: 401
};