<script setup>
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import InputField from "../../Components/InputField.vue";
import TextArea from "../../Components/TextArea.vue";
import ImageUpload from "../../Components/ImageUpload.vue";
import ErrorMessages from "../../Components/ErrorMessages.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    listing: Object,
});

const form = useForm({
    title: props.listing.title,
    desc: props.listing.desc,
    tags: props.listing.tags,
    email: props.listing.email,
    link: props.listing.link,
    image: null,
});
</script>
<template>
    <Head title="- Edit Listing" />
    <Container>
        <Title>Edit Your Listing</Title>
        <ErrorMessages :errors="form.errors" />
        <form class="grid grid-cols-2 gap-5">
            <div class="space-y-6">
                <InputField
                    label="Title"
                    icon="heading"
                    placeholder="My new listing"
                    v-model="form.title"
                />
                <InputField
                    label="Tags (Separate with comma)"
                    icon="tags"
                    placeholder="one, two, three"
                    v-model="form.tags"
                />
                <TextArea
                    label="Description"
                    icon="newspaper"
                    placeholder="This is the description..."
                    v-model="form.desc"
                />
            </div>
            <div class="space-y-6">
                <InputField
                    label="Email"
                    icon="at"
                    placeholder="example@mail.com"
                    v-model="form.email"
                />
                <InputField
                    label="External Link"
                    icon="up-right-from-square"
                    placeholder="https://inertiajs.com"
                    v-model="form.link"
                />
                <ImageUpload
                    @image="(e) => (form.image = e)"
                    :listingImage="listing.image"
                />
            </div>
            <div>
                <PrimaryBtn :disabled="form.processing">Update</PrimaryBtn>
            </div>
        </form>
    </Container>
</template>
