export const ENDPOINTS = {
    BASE: process.env.MIX_API_URL,
    LOGIN: 'oauth/token',
    LOGIN_REFRESH: 'oauth/token',
    PRODUCTS: 'products',
    USER: 'user'
};

export const PRODUCTS = [
    {
        name: "Mojito",
        image: "images/mojito.jpg"
    },
    {
        name: "Belverdere 7Up",
        image: "images/belverdere-7up.jpg"
    },
    {
        name: "Moscow Mule",
        image: "images/moscow-mule.jpg"
    },
    {
        name: "Blue lagoon",
        image: "images/blue-lagoon.jpg"
    }
];