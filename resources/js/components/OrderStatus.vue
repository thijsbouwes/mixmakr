<template>
    <div class="lg:w-1/2 mx-2">
        <div class="my-12 text-grey-darker">
            <h3 class="text-3xl text-grey-darkest font-bold leading-none mb-3">
                Dear {{ order.user.name }},
            </h3>
            MixMakr {{ order.machine.name }} ({{ order.machine.city }}) is preparing your order.<br>
        </div>
        <div
            v-for="product in order.drinks"
            class="flex justify-between items-center my-5 font-bold text-xl text-grey-darkest"
        >
            <img :src="product.image" class="h-24 w-24 mr-2" style="object-fit: cover">
            <span class="w-1/3 flex items-center relative">
                {{ product.name }}

                <span class="absolute text-sm" style="top: 2rem">
                    <font-awesome-icon
                        v-for="(n,index) in product.pivot.quantity"
                        :key="index"
                        icon="cocktail"
                        class="w-full fill-current white mr-1"
                        :class="[n > product.pivot.quantity_complete ? 'opacity-50' : '']"
                        title="Complete"/>
                </span>
            </span>
            <span class="w-64 block uppercase tracking-wide text-grey-darker text-xs font-bold">
                <span v-if="product.pivot.status === 'pending'">
                    Pending
                </span>
                <span v-else-if="product.pivot.status === 'in_progress'">
                    In progress, place your glass!
                </span>
                <span v-else>
                    Complete
                </span>
            </span>
            <span class="w-24 flex items-center">
                <font-awesome-icon v-if="product.pivot.status === 'pending'" icon="list" class="w-full fill-current white" title="Pending"/>
                <font-awesome-icon v-else-if="product.pivot.status === 'in_progress'" icon="spinner" class="w-full fill-current white fa-spin" title="In progress"/>
                <font-awesome-icon v-else icon="check" class="w-full fill-current white" title="Complete"/>
            </span>
        </div>
    </div>
</template>

<script>
    import {ENDPOINTS} from "../config/api";

    export default {
        props: {
            orderId: {
                type: Number,
                required: true,
            }
        },

        data() {
            return {
                order: {
                    drinks: [],
                    machine: {
                        name: '',
                        city: ''
                    },
                    user: {
                        name: ''
                    }
                }
            }
        },

        created() {
            this.$echo.private('order.' +  this.orderId)
                .listen('updated', (event) => {
                    console.log(event);
                });

            this.$http.get(ENDPOINTS.ORDERS + '/' + this.orderId)
                .then(response => {
                    this.order = response.data;
                });
        },

        methods: {

        }
    }
</script>