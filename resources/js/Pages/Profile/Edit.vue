<script setup>
import UpdateInfo from "./Sections/UpdateInfo.vue";

defineProps({
    user: Object,
    status: String,
});
</script>
<template>
    <div>
        <Head title="- Profile" />
        <UpdateInfo :user="user" :status="status" />
    </div>
</template>
