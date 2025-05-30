<script setup>
import { ref } from "vue";

const emit = defineEmits(["image"]);
const preview = ref(null);
const oversizedImage = ref(false);

const selectImage = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
    oversizedImage.value = e.target.files[0].size > 3145728;
    emit("image", e.target.files[0]);
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
            class="block mt-1 overflow-hidden border rounded-md cursor-pointer h-[140px] bg-slate-300 border-slate-300"
        >
            <img
                :src="preview ?? '/storage/images/listing/default.png'"
                class="object-cover object-center w-full h-full"
                alt="Preview Image"
            />
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
