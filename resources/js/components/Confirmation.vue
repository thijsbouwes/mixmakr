<template>
    <div class="lg:w-1/2 mx-2">
        <div
            v-for="product in cart"
            class="flex justify-between items-center my-5 font-bold text-xl text-grey-darkest"
        >
            <img :src="product.image" class="h-24 w-24 mr-2" style="object-fit: cover">
            <span class="w-1/3 flex items-center">
                {{ product.name }}
            </span>
            <span class="w-12 flex items-center">
                {{ product.quantity }}
            </span>
            <span class="flex items-center lg:inline-block hidden">
                {{ product.price | formatNumber }}
            </span>
            <span class="w-24 flex items-center">
                {{ product.quantity * product.price | formatNumber }}
            </span>
        </div>

        <div class="font-bold text-xl text-grey-darkest flex justify-end my-5">
            <span class="w-24">
                Total:
            </span>
            <span class="w-24">
                {{ totalPrice | formatNumber }}
            </span>
        </div>

        <div class="mx-auto flex justify-between pt-4 pb-12">
            <button @click="back" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-darkest font-bold rounded-full my-6 py-4 px-8 shadow" type="button">
                <font-awesome-icon icon="chevron-left" class="w-full fill-current white mr-1"/> Back
            </button>
            <button @click="confirm" class="mx-auto lg:mx-0 hover:underline gradient text-white opacity-75 font-bold rounded-full my-6 py-4 px-8 shadow" type="button">
                Confirm <font-awesome-icon icon="chevron-right" class="w-full fill-current white ml-1"/>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            cart: {
                type: Array,
                required: true,
            }
        },

        computed: {
            totalPrice() {
                return this.cart.map(product => product.price * product.quantity).reduce((a, b) => a + b);
            }
        },

        methods: {
            confirm() {
                this.$emit('confirm');
            },

            back() {
                this.$emit('back');
            }
        }
    }
</script>