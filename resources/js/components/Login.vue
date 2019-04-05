<template>
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" role="form" method="POST" @submit.prevent="doSubmit()">
            <div class="mb-4" v-if="register">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input v-model="user.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" required maxlength="255">
            </div>
            <div class="mb-4" v-if="register">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    Date of Birth
                </label>
                <input v-model="user.date_of_birth" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="date_of_birth" type="date" placeholder="Name" required :max="dateEighteenYears">
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input v-model="user.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="email@example.com" required maxlength="255">
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input v-model="user.password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" required minlength="8" maxlength="255">
            </div>
            <div class="mb-4" v-if="register">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password_confirmation">
                    Password Confirmation
                </label>
                <input v-model="user.password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" placeholder="******************" required minlength="8" maxlength="255">
            </div>
            <div class="flex items-center justify-between mt-2">
                <button class="gradient hover:underline hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ register ? "Register" : "Sign In" }}
                </button>
                <a @click="register = !register" class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                    {{ register ? "Login" : "Register" }}
                </a>
            </div>
        </form>
    </div>
</template>

<script>
    import Auth from '../service/auth-service';

    export default {
        data() {
            return {
                register: false,
                user: {
                    name: "",
                    date_of_birth: "",
                    email: "",
                    password: "",
                    password_confirmation: ""
                }
            }
        },

        computed: {
            dateEighteenYears() {
                return this.$moment().subtract(18, 'years').format('Y-MM-DD');
            }
        },

        methods: {
            doSubmit() {
                Auth.register(this.user.name, this.user.email, this.user.password)
                    .then(response => {
                        // Login and redirect
                        Auth.login(this.user.email, this.user.password)
                            .then(response => {
                                this.$router.push('/')
                            })
                            .catch(error => {
                                Console.log("Error: " + error);
                            })

                    })
                    .catch(error => {
                        // Show error
                        this.$M.toast({ html: "Error: " + error.response.status + ", " + error.response.data, classes: "red" });
                    });
            }
        }
    }
</script>