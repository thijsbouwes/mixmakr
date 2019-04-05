<template>
    <layout>
        <!--Hero-->
        <div class="pt-24">
            <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full md:w-3/5 justify-center items-start text-center md:text-left">
                    <p class="uppercase tracking-loose w-full">What drink would you like?</p>
                    <h1 class="my-4 text-5xl font-bold leading-tight">MixMakr can serve you all kinds of delicious drinks.</h1>
                    <p class="leading-normal text-2xl mb-8">Create your account, and get the first drink for free.</p>

                    <router-link tag="button" to="order" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg">
                        Try It Out
                    </router-link>
                </div>

                <!--Right Col-->
                <div class="w-full md:w-2/5 py-6 text-right">
                    <img class="z-50" src="images/mixed-drink.png" style="height: 500px">
                </div>
            </div>
        </div>

        <div class="relative -mt-12 lg:-mt-24">
            <img src="images/header-hero.svg" alt="header hero">
        </div>

        <!--About us-->
        <section class="bg-white border-b py-8 -mt-2">
            <div class="container max-w-5xl mx-auto m-8">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-grey-darkest" id="aboutUs">About Us</h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-5/6 sm:w-1/2 p-6">
                        <h3 class="text-3xl text-grey-darkest font-bold leading-none mb-3">Team</h3>
                        <p class="text-grey-darker mb-8">MixMakr is created by Rens, Rutger and Thijs. During this project we did research on how to create the perfect robotic bartender. Research included: reliability of software and hardware.</p>
                    </div>
                    <div class="w-full sm:w-1/2 p-6">
                        <img src="images/having-fun.svg" alt="having fun">
                    </div>
                </div>

                <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                    <div class="w-full sm:w-1/2 p-6 mt-6">
                        <iframe width="100%" class="lg:h-64 md:h-48 sm:h-32" src="https://www.youtube.com/embed/HmZKgaHa3Fg?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="w-full sm:w-1/2 p-6 mt-6">
                        <div class="align-middle">
                            <h3 class="text-3xl text-grey-darkest font-bold leading-none mb-3">MixMakr</h3>
                            <p class="text-grey-darker mb-8">Order your favourite drink fast and reliable through the MixMakr app, who doesn’t want that. MixMakr guarantees quality and fast services, this is made possible with the latest technology in software and hardware.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!--Popular drinks-->
        <section class="bg-grey-lightest py-8" id="popularDrinks">
            <div class="mx-auto flex flex-wrap pt-4 pb-12">

                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-grey-darkest">Popular Drinks</h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>

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
        </section>
    </layout>
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
