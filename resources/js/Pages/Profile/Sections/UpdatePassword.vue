<script setup>
import { useForm } from "@inertiajs/vue3";
import Container from "../../../Components/Container.vue";
import InputField from "../../../Components/InputField.vue";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import Title from "../../../Components/Title.vue";
import ErrorMessages from "../../../Components/ErrorMessages.vue";
import SessionMessages from "../../../Components/SessionMessages.vue";

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.put(route("profile.password"), {
        onSuccess: () => form.reset(),
        onError: () => form.reset(),
        preserveScroll: true,
    });
};
</script>
<template>
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Update Password</Title>
            <p>Ensure you're using a long, random password to stay secure.</p>
        </div>
        <ErrorMessages :errors="form.errors" />
        <form @submit.prevent="submit" class="space-y-6">
            <InputField
                label="Current Password"
                icon="key"
                type="password"
                class="w-1/2"
                v-model="form.current_password"
            ></InputField>
            <InputField
                label="New Password"
                icon="key"
                type="password"
                class="w-1/2"
                v-model="form.password"
            ></InputField>
            <InputField
                label="Confirm New Password"
                icon="key"
                type="password"
                class="w-1/2"
                v-model="form.password_confirmation"
            ></InputField>
            <p
                v-if="form.recentlySuccessful"
                class="font-medium text-green-500"
            >
                Saved
            </p>
            <PrimaryBtn :disabled="form.processing">Save</PrimaryBtn>
        </form>
    </Container>
</template>
