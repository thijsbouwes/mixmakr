<template>
    <div>
        <div class="mx-auto py-4">
            <div class="w-64 mx-auto">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 text-center" for="location">
                    Select your location
                </label>
                <div class="relative">
                    <select
                            id="location"
                            @change="loadDrinksForLocation()"
                            v-model="location"
                            :disabled="loading"
                            class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option disabled value="-1">Select location..</option>
                        <option v-for="machine in machines" :value="machine.id">{{ machine.name }} ({{ machine.city }})</option>
                    </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto flex flex-wrap pt-4 pb-12">
            <div class="w-full md:w-1/2 lg:w-1/4 p-6 flex flex-col flex-grow flex-shrink"
                 v-for="product in products"
            >
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow object-cover" @click="addToCart">
                    <div class="">
                        <img class="h-64 w-full" :src="product.image" :alt="product.name" style="object-fit: cover">
                    </div>
                    <div class="w-full font-bold text-xl text-grey-darkest p-6 flex justify-between">
                        <span>
                            {{ product.name }}
                            <span class="block uppercase tracking-wide text-grey-darker text-sm font-bold mb-2">
                                &euro; {{ product.price }}
                            </span>
                        </span>
                        <div class="hidden justify-between items-center">
                            <button @click="product.quantity--" :disabled="product.quantity <= 0">
                                <font-awesome-icon icon="minus" class="w-full fill-current white"/>
                            </button>
                            <span class="bg-grey-lightest rounded-full h-10 w-10 flex items-center justify-center mx-2">
                                {{ product.quantity }}
                            </span>
                            <button @click="product.quantity++" :disabled="product.quantity >= 5">
                                <font-awesome-icon icon="plus" class="w-full fill-current white"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto flex justify-center pt-4 pb-12">
            <button @click="order" :disabled="cart.length <= 0" :class="[cart.length <= 0 ? 'opacity-50 cursor-default' : 'hover:underline opacity-75']" class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow" type="button">
                Order Drinks <font-awesome-icon icon="chevron-right" class="w-full fill-current white ml-1"/>
            </button>
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
                location: -1,
                products: [],
                machines: []
            }
        },

        created() {
            this.$http.get(ENDPOINTS.MACHINES)
                .then(response => {
                    this.machines = response.data;
                })
        },

        computed: {
            cart() {
                return this.products.filter(product => product.quantity > 0);
            }
        },

        methods: {
            order() {
                this.$emit('order', this.cart);
            },

            loadDrinksForLocation() {
                this.$emit('location', this.location);
                this.loading = true;
                this.$http.get(ENDPOINTS.MACHINES + '/' + this.location + '/drinks')
                    .then(response => {
                        this.products = response.data.map(product => {
                            product.quantity = 0;

                            return product;
                        });
                        this.loading = false;
                    })
            }
        }
    }
</script>