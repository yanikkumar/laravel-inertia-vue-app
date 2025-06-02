<script setup>
import { ref } from "vue";

const emit = defineEmits(["image"]);
const props = defineProps({
    listingImage: String,
});
const currentImage = props.listingImage
    ? `/storage/${props.listingImage}`
    : null;
const preview = ref(currentImage);
const oversizedImage = ref(false);
const showRevertBtn = ref(false);

const selectImage = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
    oversizedImage.value = e.target.files[0].size > 3145728;
    showRevertBtn.value = true;
    emit("image", e.target.files[0]);
};

const revertImageChange = () => {
    showRevertBtn.value = false;
    preview.value = currentImage;
    oversizedImage.value = false;
};
</script>
<template>
    <div
        class="block text-sm font-medium text-slate-700 dark:text-slate-300"
        :class="{ '!text-red-500': oversizedImage }"
    >
        {{ oversizedImage ? "The image exceeds 3MB" : "Image (Max Size 3Mb)" }}
    </div>
    <div>
        <label
            for="image"
            :class="{ '!border-red-500': oversizedImage }"
            class="block mt-1 overflow-hidden border rounded-md cursor-pointer h-[140px] bg-slate-300 border-slate-300 relative"
        >
            <img
                :src="preview ?? '/storage/images/listing/default.png'"
                class="object-cover object-center w-full h-full"
                alt="Preview Image"
            />

            <button
                v-if="showRevertBtn"
                @click.prevent="revertImageChange"
                class="absolute grid w-8 h-8 rounded-full bg-white/75 place-items-center text-slate-700 top-2 right-2"
                type="button"
            >
                <i class="fa-solid fa-rotate-left"></i>
            </button>
        </label>

        <input
            @input="selectImage"
            type="file"
            hidden
            name="image"
            id="image"
        />
    </div>
</template>
