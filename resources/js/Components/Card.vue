<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    listing: Object,
});
</script>
<template>
    <div
        class="flex flex-col justify-between h-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-slate-800"
    >
        <div>
            <!-- Image -->
            <Link href="">
                <img
                    :src="
                        listing.image
                            ? `/storage/${listing.image}`
                            : '/storage/images/listing/default.png'
                    "
                    alt=""
                    class="object-contain object-center w-full h-48 bg-slate-800"
                />
            </Link>
            <!-- Title -->
            <div class="p-4">
                <h3 class="mb-2 text-xl font-bold">
                    {{ listing.title.substring(0, 30) }}...
                </h3>

                <p>
                    Listed on
                    {{ new Date(listing.created_at).toLocaleDateString() }} by
                    <button class="text-link">
                        {{ listing.user.name }}
                    </button>
                </p>
            </div>
        </div>

        <!-- Tags -->
        <div v-if="listing.tags" class="flex items-center gap-3 px-4 pb-4">
            <div v-for="tag in listing.tags.split(',')" :key="tag">
                <button
                    class="px-2 py-px text-white rounded-full bg-slate-500 hover:bg-slate-700 dark:hover:bg-slate-900"
                >
                    {{ tag }}
                </button>
            </div>
        </div>
    </div>
</template>
