<script setup>
import { switchTheme } from "../theme";
import NavLink from "../Components/NavLink.vue";
import { usePage } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);

const show = ref(false);
</script>

<template>
    <div class="fixed inset-0 z-40" v-show="show" @click="show = false"></div>
    <header class="text-white bg-slate-800">
        <nav
            class="flex items-center justify-between max-w-screen-lg p-6 mx-auto"
        >
            <NavLink routeName="home" componentName="Home">Home</NavLink>

            <div class="flex items-center space-x-6">
                <!-- Auth -->
                <div v-if="user" class="relative">
                    <div
                        @click="show = !show"
                        class="flex items-center gap-2 px-2 py-1 rounded-lg cursor-pointer hover:bg-slate-700"
                        :class="{ 'bg-slate-700': show }"
                    >
                        <p>{{ user.name }}</p>
                        <i class="fa fa-solid fa-angle-down"></i>
                    </div>
                    <!-- User Dropdown -->
                    <div
                        v-show="show"
                        @click="show = false"
                        class="absolute right-0 z-50 w-40 overflow-hidden border rounded-lg top-16 bg-slate-800 text-wite border-slate-600"
                    >
                        <Link
                            :href="route('profile.edit')"
                            class="block w-full px-6 py-3 text-left hover:bg-slate-700"
                            >Profile</Link
                        >
                        <Link
                            :href="route('dashboard')"
                            class="block w-full px-6 py-3 text-left hover:bg-slate-700"
                            >Dashboard</Link
                        >
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="block w-full px-6 py-3 text-left hover:bg-slate-700"
                            >Logout</Link
                        >
                    </div>
                </div>
                <!-- Guest -->
                <div v-else class="space-x-6">
                    <NavLink routeName="login" componentName="Auth/Login"
                        >Login</NavLink
                    >
                    <NavLink routeName="register" componentName="Auth/Register"
                        >Register</NavLink
                    >
                </div>
                <button
                    @click="switchTheme"
                    class="grid w-6 h-6 rounded-full hover:bg-slate-700 place-items-center hover:outline outline-1"
                >
                    <i class="fa fa-solid fa-circle-half-stroke"></i>
                </button>
            </div>
        </nav>
    </header>

    <main class="max-w-screen-lg p-6 mx-auto">
        <slot />
    </main>
</template>
