<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
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
        <form class="space-y-6">
            <InputField icon="id-badge" label="Name" placeholder="Name" />
            <InputField
                type="email"
                icon="at"
                label="Email"
                placeholder="Email"
            />
            <InputField
                type="password"
                icon="key"
                label="Password"
                placeholder="Password"
            />
            <InputField
                type="password"
                icon="key"
                label="Confirm Password"
                placeholder="Confirm Password"
            />
            <p class="text-sm text-slate-500 dark:text-slate-400">
                By creating an account, you agree to our Terms of Service and
                Privacy Policy.
            </p>
            <PrimaryBtn>Register</PrimaryBtn>
        </form>
    </Container>
</template>
