<script setup>
import UpdateInfo from "./Sections/UpdateInfo.vue";
import UpdatePassword from "./Sections/UpdatePassword.vue";

defineProps({
    user: Object,
    status: String,
});
</script>
<template>
    <div>
        <Head title="- Profile" />
        <UpdateInfo :user="user" :status="status" />
        <UpdatePassword />
    </div>
</template>
