<template>
    <form
        class="max-w-5xl mx-auto"
        :class="class"
        @submit.prevent="SearchCustomers"
    >
        <label
            for="default-search"
            class="mb-2 text-sm font-medium sr-only text-white"
            >Search</label
        >
        <div class="relative">
            <div
                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
            >
                <svg
                    class="w-4 h-4 text-gray-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 20"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                    />
                </svg>
            </div>
            <input
                type="search"
                id="default-search"
                class="block w-full p-4 ps-10 text-sm border rounded-lg bg-slate-900 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                :placeholder="'Busca ' + title || '...'"
                required
                v-model="q"
                @blur="manageBlur"
            />
        </div>
        <slot />
    </form>
</template>

<script setup>
import { useVModel } from "@vueuse/core";

const props = defineProps({ title: String, class: String, modelValue: String });
const emit = defineEmits(["update:modelValue", "blur"]);
const q = useVModel(props, "modelValue", emit);

function manageBlur() {
    setTimeout(() => {
        emit("blur");
    }, 500);
}
</script>

<style lang="scss" scoped></style>
