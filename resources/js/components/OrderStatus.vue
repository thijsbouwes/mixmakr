<template>
    <div class="lg:w-1/2 mx-2">
        <div class="my-12 text-grey-darker text-center">
            MixMakr is preparing your order: {{ message }}.<br>
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
                <font-awesome-icon v-else icon="spinner" class="w-full fill-current white fa-spin" title="In progress"/>
            </span>
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

        created() {
            this.$echo.private('order.' +  this.order.id)
                .listen('.updated', (event) => {
                    this.message = event.message;
                    this.order.status = event.order.status;
                    console.log(event);
                });
        },

        methods: {

        }
    }
</script>