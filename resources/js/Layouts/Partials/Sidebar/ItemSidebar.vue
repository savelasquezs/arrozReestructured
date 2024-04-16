<template>
    <li class="text-white/60">
        <Link
            :href="href"
            class="flex items-center p-2 rounded-lg hover:bg-gray-700 group w-full"
            :class="{ 'text-white': $page.url === href }"
            as="button"
        >
            <Icon :icon="icon_name" color="#a5b4fc" />
            <span class="ms-3">{{ name }}</span>
        </Link>
    </li>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { Icon } from "@iconify/vue";

defineProps({ href: String, name: String, icon_name: String });
</script>

<style lang="scss" scoped></style>
