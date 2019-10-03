<template>
    <div>
        <div class="mx-auto flex flex-wrap pt-4 pb-12">
            <div class="w-full md:w-1/2 lg:w-1/4 p-6 flex flex-col flex-grow flex-shrink"
                 v-for="product in products"
            >
                <div :class="[product.inStock ? 'shadow cursor-pointer' : 'opacity-50']" class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden object-cover" @click="order(product)">
                    <div>
                        <img class="h-64 w-full" :src="product.image" :alt="product.name" style="object-fit: cover">
                    </div>
                    <div class="w-full font-bold text-xl text-grey-darkest p-6 flex justify-between">
                        <span>
                            {{ product.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { ENDPOINTS } from '../config/api';
    import Layout from "../layouts/Layout";

    export default {
        components: { Layout },
        data() {
            return {
                loading: false,
                products: []
            }
        },

        created() {
            this.loading = true;
            this.$http.get(ENDPOINTS.DRINKS)
                .then(response => {
                    this.products = response.data;
                    this.loading = false;
                })
        },

        methods: {
            order(product) {
                if (product.inStock === false) {
                    return;
                }

                this.$emit('order', product);
            }
        }
    }
</script>