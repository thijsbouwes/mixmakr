<template>
            <div class="card-panel">

                <form role="form" method="POST" @submit.prevent="doSubmit()">
                    <div class="input-field">
                        <i class="material-icons prefix">mail_outline</i>
                        <label for="email">Email</label>
                        <input id="email" v-model="email" type="email" class="form-control" name="email" length="255" maxlength="255" required autofocus>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">lock_outline</i>
                        <label for="password">Password</label>
                        <input id="password" v-model="password" type="password" class="form-control" name="password" length="255" maxlength="255" minlength="5" required>
                    </div>

                    <div class="input-field center-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
                    </div>

                    <div class="center-align">
                        <router-link tag="span" to="/forgot-password" exact><a>Forgot password?</a></router-link>
                    </div>
                </form>

            </div>

</template>

<script>

    export default {
        data() {
            return {
                email: '',
                password: '',
            }
        },

        methods: {
            doSubmit() {
                Auth.login(this.email, this.password)
                    .then(data => {
                        // Redirect
                        this.$router.push('/dashboard');
                        this.$M.toast({ html: "Welcome  👋🏼", classes: "green" });
                    })
                    .catch(error => {
                        // Show error
                        this.$M.toast({ html: "Error: " + error.response.status + ", " + error.response.data.message, classes: "red" });
                    });
            }
        }
    }
</script>