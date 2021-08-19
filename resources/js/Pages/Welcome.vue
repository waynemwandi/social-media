<template>
    <div>
        <Head title="Welcome" />

        <div class="flex justify-around items-center bg-gray-100 min-h-screen">
            <div>
                <img :src="'/storage/images/logo.png'" alt="Social Media" />
            </div>
            <div class="text-center">
                <h1 class="text-4xl font-semibold">
                    Social Media Feed
                </h1>

                <div v-if="canLogin" class="flex justify-center space-x-6 mt-5">
                    <inertia-link href="#" v-if="$page.props.user" class="text-lg text-gray-700 underline">
                        Social Media Feed
                    </inertia-link>
                    <template v-else>
                        <inertia-link href="resources/js/Pages/Auth/Login.vue" class="btn text-white bg-gray-800 rounded px-3 py-1 hover:primaryColour" style="cursor: pointer;">
                            Login
                        </inertia-link>
                        <inertia-link :href="route('register')" v-if="canRegister" class="text-white bg-gray-800 rounded px-3 py-1 hover:primaryColour" style="cursor: pointer;">
                            Register
                        </inertia-link>
                    </template>
                </div>

                <p class="mt-10">{{ users }} active members</p>
            </div>
        </div>
        <!-- <div
            class="
                relative
                flex
                items-top
                justify-center
                min-h-screen
                bg-gray-100
                dark:bg-gray-900
                sm:items-center sm:pt-0
            "
        >
            <div
                v-if="canLogin"
                class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
            >
                <Link
                    v-if="$page.props.user"
                    :href="route('dashboard')"
                    class="text-sm text-gray-700 underline"
                >
                    Dashboard
                </Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="text-sm text-gray-700 underline"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 text-sm text-gray-700 underline"
                    >
                        Register
                    </Link>
                </template>
            </div>
        </div> -->
    </div>
</template>

<style css>
.hover\:primaryColour:hover {
	opacity: 1;
	background-color: #0400D2;
}
</style>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Head,
        Link,
    },

    props: {
        users: Number,
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>

