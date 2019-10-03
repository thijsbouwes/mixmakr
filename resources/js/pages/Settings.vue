<template>
    <layout :minimalistLayout="true">

        <div class="pt-16"></div>

        <div class="relative -mt-12 lg:-mt-24">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                        <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
                        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#f8fafc" fill-rule="nonzero">
                        <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
                    </g>
                </g>
            </svg>
        </div>

        <section class="bg-grey-lightest -mt-2">
            <div class="mx-auto flex flex-wrap pb-12 justify-center">

                <h1 class="w-full mb-2 text-5xl font-bold leading-tight text-center text-grey-darkest">Ingredients</h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>

                <div class="lg:w-1/2 mx-2">
                    <div class="flex justify-between items-center my-5 font-bold text-xl text-grey-darkest">
                        <span class="w-1/3 flex items-center relative text-xl">Name</span>
                        <span class="w-1/3 flex items-center justify-center relative text-xl">Position</span>
                        <span class="w-1/3 flex items-center justify-end relative text-xl">Amount</span>
                    </div>
                </div>

                <div class="lg:w-1/2 mx-2" v-for="ingredient in ingredients">
                    <div class="flex justify-between items-center my-5 font-bold text-xl text-grey-darkest">
                        <span class="w-1/3 flex items-center relative text-xl">{{ ingredient.name }}</span>
                        <span class="w-1/3 flex items-center justify-center">
                            <span class="flex justify-center items-center bg-white rounded-full h-6 w-6 shadow cursor-pointer">
                                <font-awesome-icon icon="minus" class="w-full fill-current text-black text-sm" title="Complete" @click="ingredient.position = ingredient.position - 1"/>
                            </span>
                            <span class="w-16 uppercase tracking-wide text-grey-darker text-sm font-bold text-center">{{ ingredient.position }}</span>
                            <span class="flex justify-center items-center bg-white rounded-full h-6 w-6 shadow cursor-pointer" @click="ingredient.position = ingredient.position + 1" >
                                <font-awesome-icon icon="plus" class="w-full fill-current text-black text-sm" title="Complete" />
                            </span>
                        </span>
                        <span class="w-1/3 flex items-center justify-end">
                            <span class="flex justify-center items-center bg-white rounded-full h-6 w-6 shadow cursor-pointer">
                                <font-awesome-icon icon="minus" class="w-full fill-current text-black text-sm" title="Complete" @click="ingredient.amount = ingredient.amount - 100"/>
                            </span>
                            <span class="w-16 uppercase tracking-wide text-grey-darker text-sm font-bold text-center">{{ ingredient.amount }}</span>
                            <span class="flex justify-center items-center bg-white rounded-full h-6 w-6 shadow cursor-pointer" @click="ingredient.amount = ingredient.amount + 100" >
                                <font-awesome-icon icon="plus" class="w-full fill-current text-black text-sm" title="Complete" />
                            </span>
                        </span>
                    </div>
                </div>

                <div class="lg:w-1/2 mx-2">
                    <button @click="update" class="gradient float-right lg:mx-0 hover:underline text-white bg-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                        Update
                    </button>
                </div>
            </div>

            <router-link to="/order">
                <div class="absolute flex justify-center items-center bg-white rounded-full h-12 w-12 shadow-md cursor-pointer" style="bottom: 2em; left: 2em;">
                    <font-awesome-icon icon="arrow-left" class="w-full fill-current text-black" title="Complete"/>
                </div>
            </router-link>
        </section>
    </layout>
</template>

<script>
    import Login from '../components/Login';
    import Shop from '../components/Shop';
    import OrderStatus from '../components/OrderStatus';
    import Layout from "../layouts/Layout";
    import Progress from '../components/Progress';
    import {ENDPOINTS} from "../config/api";

    export default {
        components: {Shop, Layout, Login, Progress, OrderStatus},
        data() {
            return {
                ingredients: [],
                changedIngredientIds: []
            }
        },

        created() {
            this.$http.get(ENDPOINTS.INGREDIENTS)
                .then(response => {
                    this.ingredients = response.data;
                })
        },

        methods: {
            update() {
                this.$http.post(ENDPOINTS.INGREDIENTS, {ingredients: this.ingredients})
                    .then(response => {
                        this.$router.push('order');
                    })
            }
        }
    }
</script>