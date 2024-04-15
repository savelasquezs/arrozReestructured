<template>
    <li>
        <Link
            :href="href"
            class="flex items-center p-2 rounded-lg text-white/60 hover:bg-gray-700 group w-full"
            :class="{ 'text-white': $page.url === href }"
            as="button"
        >
            <slot name="icon" />
            <span class="ms-3">{{ name }}</span>
        </Link>
    </li>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({ href: String, name: String });
</script>

<style lang="scss" scoped></style>
