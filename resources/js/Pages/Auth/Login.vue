<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";
import ErrorMessages from "../../Components/ErrorMessages.vue";
import CheckBox from "../../Components/CheckBox.vue";

const form = useForm({
    email: "",
    password: "",
    remember: null,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>
<template>
    <Head title="Login" />
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Login</Title>
            <p>
                Need an account?
                <TextLink routeName="register" label="Register" />
            </p>
        </div>
        <!-- Error Messages -->
        <ErrorMessages :errors="form.errors" />
        <form @submit.prevent="submit" class="space-y-6">
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
            <div class="flex items-center justify-between">
                <CheckBox name="remeber" v-model="form.remember"
                    >Remember Me</CheckBox
                >
                <TextLink routeName="home" label="Forgot Password?" />
            </div>
            <PrimaryBtn :disabled="form.processing">Login</PrimaryBtn>
        </form>
    </Container>
</template>
