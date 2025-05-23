<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";
import ErrorMessages from "../../Components/ErrorMessages.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("name", "email"),
    });
};
</script>

<template>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Register a new account</Title>
            <p>
                Already have an account?
                <TextLink routeName="home" label="Login" />
            </p>
        </div>
        <!-- Error Messages -->
        <ErrorMessages :errors="form.errors" />
        <form @submit.prevent="submit" class="space-y-6">
            <InputField
                icon="id-badge"
                label="Name"
                placeholder="Name"
                v-model="form.name"
            />
            <InputField
                type="email"
                icon="at"
                label="Email"
                placeholder="Email"
                v-model="form.email"
            />
            <InputField
                type="password"
                icon="key"
                label="Password"
                placeholder="Password"
                v-model="form.password"
            />
            <InputField
                type="password"
                icon="key"
                label="Confirm Password"
                placeholder="Confirm Password"
                v-model="form.password_confirmation"
            />
            <p class="text-sm text-slate-500 dark:text-slate-400">
                By creating an account, you agree to our Terms of Service and
                Privacy Policy.
            </p>
            <PrimaryBtn :disabled="form.processing">Register</PrimaryBtn>
        </form>
    </Container>
</template>
