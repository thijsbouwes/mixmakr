<template>
    <div class="lg:w-1/2 mx-2">
        <div class="my-12 text-grey-darker text-center text-xl">
            MixMakr is preparing your order #{{ order.id }}: <span class="font-bold">{{ message }}.</span><br>
        </div>
        <div class="flex justify-between items-center my-5 font-bold text-xl text-grey-darkest">
            <img :src="order.drink.image" class="h-24 w-24 mr-2" style="object-fit: cover">
            <span class="w-1/3 flex items-center relative text-xl">
                {{ order.drink.name }}
            </span>
            <span class="w-64 block uppercase tracking-wide text-grey-darker text-xs font-bold">
                {{ order.status }}
            </span>
            <span class="w-24 flex items-center">
                <font-awesome-icon v-if="order.status === 'completed'" icon="check" class="w-full fill-current white" title="Complete"/>
                <font-awesome-icon v-if="order.status === 'cancelled'" icon="times" class="w-full fill-current white" title="Cancelled"/>
                <font-awesome-icon v-if="order.status === 'pending'" icon="spinner" class="w-full fill-current white fa-spin" title="In progress"/>
                <font-awesome-icon v-if="order.status === 'creating'" icon="spinner" class="w-full fill-current white fa-spin" title="In progress"/>
            </span>
        </div>
        <div class="mt-10 font-bold text-xl text-grey-darkest">
            <button @click="orderAgain" v-if="orderAgainStatus" class="gradient float-right lg:mx-0 hover:underline text-white bg-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                Order Again
            </button>
            <button @click="cancelOrder" v-else class="gradient float-right lg:mx-0 hover:underline text-white bg-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                Cancel
            </button>
        </div>
    </div>
</template>

<script>
    import {ENDPOINTS} from "../config/api";

    export default {
        props: {
            order: {
                type: Object,
                required: true,
            }
        },

        data() {
            return {
                message: 'please place your glass'
            }
        },

        computed: {
            orderAgainStatus() {
                return this.order.status === 'completed' || this.order.status === 'cancelled';
            }
        },

        created() {
            this.$echo.private('order.' +  this.order.id)
                .listen('.updated', (event) => {
                    this.message = event.message;
                    this.order.status = event.order.status;
                    console.log(event);
                });
        },

        methods: {
            orderAgain() {
                this.$emit('orderAgain');
            },

            cancelOrder() {
                let data = {
                    message: 'Order cancelled',
                    status: 'cancelled',
                };

                this.$http.post(ENDPOINTS.ORDERS + '/' + this.order.id, data);
            }
        }
    }
</script>