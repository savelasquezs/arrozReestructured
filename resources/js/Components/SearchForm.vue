<template>
    <form action="" class="py-3 px-4 flex items-center">
        <label for="search" class="sr-only">Search</label>
        <div class="relative w-full">
            <input
                type="text"
                placeholder="Search..."
                class="bg-gray-50 border border-gray-300 text-gray-900"
                v-model="q"
                @input="$emit('searchMade', q)"
            />
        </div>
    </form>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
const q = ref("");
</script>

<style lang="scss" scoped></style>
