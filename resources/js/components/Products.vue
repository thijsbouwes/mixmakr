<template>
    <div class="mx-auto flex flex-wrap pt-4 pb-12">
        <div class="w-full md:w-1/2 lg:w-1/4 p-6 flex flex-col flex-grow flex-shrink"
             v-for="product in products"
        >
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow object-cover">
                <div class="">
                    <img class="h-64 w-full" :src="product.image" :alt="product.name" style="object-fit: cover">
                </div>
                <div class="w-full font-bold text-xl text-grey-darkest p-6">{{ product.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import { PRODUCTS } from "../config/products";
    import Layout from "../layouts/Layout";

    export default {
        components: { Layout },

        data() {
            return {
                products: PRODUCTS
            }
        }
    }
</script>