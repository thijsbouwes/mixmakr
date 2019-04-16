<template>
    <main class="main_content">
        <navigation :minimalistLayout="minimalistLayout"></navigation>

        <!--<router-view></router-view>-->
        <slot></slot>

        <!--Footer-->
        <img src="/images/footer-hero.svg" alt="hero">

        <section class="container mx-auto text-center py-6 mb-12" v-if="! minimalistLayout">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">Try it out now</h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <h3 class="my-4 text-3xl leading-tight">Experience the delicious taste of MixMakr</h3>
            <router-link tag="button" to="order" class="mx-auto lg:mx-0 hover:underline bg-white hover:text-grey-darkest font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                Order Drink
            </router-link>
        </section>
    </main>
</template>

<script>
    import Navigation from './Navigation';

    export default {
        components: { Navigation },
        props: {
            minimalistLayout: {
                type: Boolean,
                default: false
            }
        }
    }
</script>