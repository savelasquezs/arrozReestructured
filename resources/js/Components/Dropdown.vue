<template>
    <div class="my-2 min-w-md">
        <button
            id="dropdownDefaultButton"
            data-dropdown-toggle="dropdown"
            class="relative text-white bg-slate-900 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:ring-slate-800"
            type="button"
            @click="showDropDown = !showDropDown"
        >
            <div class="grid">
                <div class="text-xs block text-gray-400">{{ title }}</div>
                <div>
                    {{ selectedOption || "Selecciona ..." }}
                </div>
            </div>
            <svg
                class="w-2.5 h-2.5 ms-3"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m1 1 4 4 4-4"
                />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div
            v-if="showDropDown"
            id="dropdown"
            class="z-10 divide-y divide-gray-100 rounded-lg shadow w-55 bg-slate-900 absolute overflow-y-auto max-h-40 scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar scrollbar-thumb-slate-700 scrollbar-track-slate-300"
        >
            <ul
                class="py-2 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownDefaultButton"
            >
                <li
                    v-if="options"
                    v-for="option in options"
                    @click="selectOption(option)"
                >
                    <p
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        {{ option.name || option.address }}
                    </p>
                </li>
                <li v-else @click="showDropDown = false">
                    <p
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        No tenemos opciones para mostrar
                    </p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { useVModel } from "@vueuse/core";
import { ref } from "vue";
const emit = defineEmits(["update:modelValue"]);
const props = defineProps({
    options: Array,
    title: String,
    modelValue: String,
});

const showDropDown = ref(false);
const selectedOption = useVModel(props, "modelValue", emit);

function selectOption(option) {
    const { name, address } = option;
    selectedOption.value = name || address;
    showDropDown.value = false;
}
</script>

<style lang="scss" scoped></style>
