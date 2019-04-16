<template>
	<!--Nav-->
	<nav :class="[scrolledMenu ? 'scrolled' : '']" class="fixed w-full z-30 top-0 text-white">
		<div :class="[minimalistLayout ? 'justify-center' : 'justify-between']" class="w-full container mx-auto flex flex-wrap items-center mt-0 py-2">

			<div class="pl-4 flex items-center">
                <router-link to="/" class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cocktail" class="h-8 fill-current inline svg-inline--fa fa-cocktail fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M296 464h-56V338.78l168.74-168.73c15.52-15.52 4.53-42.05-17.42-42.05H24.68c-21.95 0-32.94 26.53-17.42 42.05L176 338.78V464h-56c-22.09 0-40 17.91-40 40 0 4.42 3.58 8 8 8h240c4.42 0 8-3.58 8-8 0-22.09-17.91-40-40-40zM432 0c-62.61 0-115.35 40.2-135.18 96h52.54c16.65-28.55 47.27-48 82.64-48 52.93 0 96 43.06 96 96s-43.07 96-96 96c-14.04 0-27.29-3.2-39.32-8.64l-35.26 35.26C379.23 279.92 404.59 288 432 288c79.53 0 144-64.47 144-144S511.53 0 432 0z"></path>
                    </svg> MixMakr
                </router-link>
			</div>

			<div v-if="! minimalistLayout" class="block lg:hidden pr-4">
				<button @click="mobileMenuOpen = ! mobileMenuOpen" class="flex items-center px-3 py-2 border rounded text-white border-white appearance-none focus:outline-none">
					<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
				</button>
			</div>

			<div v-if="! minimalistLayout" :class="[mobileMenuOpen ? '' : 'hidden']" class="w-full flex-grow lg:flex lg:items-center lg:w-auto lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20">
				<ul class="list-reset lg:flex justify-end flex-1 items-center">
					<li class="mr-3">
                        <router-link to="/#aboutUs" class="inline-block text-black no-underline hover:text-grey-darkest hover:text-underline py-2 px-4">
                            About Us
                        </router-link>
					</li>
					<li class="mr-3">
                        <router-link to="/#popularDrinks" class="inline-block text-black no-underline hover:text-grey-darkest hover:text-underline py-2 px-4">
                            Drinks
                        </router-link>
					</li>
				</ul>

                <router-link tag="button" to="order" class="mx-auto lg:mx-0 hover:underline bg-white hover:text-grey-darkest font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                    Order Drink
                </router-link>
			</div>
		</div>

		<hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
	</nav>
</template>


<script>
	export default {
        props: {
            minimalistLayout: {
                type: Boolean,
                default: false
            }
        },

	    data() {
	        return {
	            mobileMenuOpen: false,
                scrolledMenu: false
            }
        },

        methods: {
            handleScroll () {
                if (window.scrollY > 10 || window.innerWidth < 992) {
                    this.scrolledMenu = true;
                } else {
                    this.scrolledMenu = false;
                }
            }
        },

        created () {
            this.handleScroll();
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        }
	}
</script>

