<script setup>
import { router, useForm } from "@inertiajs/vue3";
import Container from "../../../Components/Container.vue";
import InputField from "../../../Components/InputField.vue";
import PrimaryBtn from "../../../Components/PrimaryBtn.vue";
import Title from "../../../Components/Title.vue";
import ErrorMessages from "../../../Components/ErrorMessages.vue";

const props = defineProps({
    user: Object,
    status: String,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const resendEmail = (e) => {
    router.post(
        route("verification.send"),
        {},
        {
            onStart: () => (e.target.disabled = true),
            onFinish: () => (e.target.disabled = false),
        }
    );
};
</script>
<template>
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Update Information</Title>
            <p>Update your account's profile and email address.</p>
        </div>
        <ErrorMessages :errors="form.errors" />
        <form
            @submit.prevent="form.patch(route('profile.info'))"
            class="space-y-6"
        >
            <InputField
                label="name"
                icon="id-badge"
                class="w-1/2"
                v-model="form.name"
            ></InputField>
            <InputField
                label="email"
                icon="at"
                class="w-1/2"
                v-model="form.email"
            ></InputField>

            <div v-if="user.email_verified_at == null">
                <SessionMessages :status="status" />
                <p class="text-red-500">
                    Your email address is unverified.
                    <button
                        @click="resendEmail"
                        class="font-medium text-indigo-500 underline dark:text-indigo-400 disabled:text-slate-400 disabled:cursor-wait"
                    >
                        Click here to re-send the verification email.
                    </button>
                </p>
            </div>

            <PrimaryBtn :disabled="form.processing">Save</PrimaryBtn>
        </form>
    </Container>
</template>
