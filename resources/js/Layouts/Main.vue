<script setup>
import { switchTheme } from "../theme";
import NavLink from "../Components/NavLink.vue";
</script>

<template>
    <header class="text-white bg-slate-800">
        <nav
            class="flex items-center justify-between max-w-screen-lg p-6 mx-auto"
        >
            <NavLink routeName="home" componentName="Home">Home</NavLink>

            <div class="flex items-center space-x-6">
                <NavLink routeName="register" componentName="Auth/Register"
                    >Register</NavLink
                >
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
