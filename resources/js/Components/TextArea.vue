<script setup>
const model = defineModel();

defineProps({
    label: String,
    icon: String,
    placeholder: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div>
        <label
            :for="label"
            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
            >{{ label }}</label
        >
    </div>
    <div class="relative mt-1 rounded-md">
        <div
            class="absolute left-0 flex items-center pl-3 pointer-events-none top-3"
        >
            <span class="grid text-sm place-content-center text-slate-400">
                <i :class="`fa-solid fa-${icon}`"></i>
            </span>
        </div>
        <textarea
            rows="6"
            :name="label"
            :placeholder="placeholder"
            v-model="model"
            class="block w-full pr-3 text-sm rounded-md pl-9 dark:text-slate-900 border-slate-300 outline-0 focus:ring-1 focus:ring-inset focus:ring-indiogo-400 focus:border-indigo-400 placeholder:text-slate-400"
        ></textarea>
    </div>
</template>
