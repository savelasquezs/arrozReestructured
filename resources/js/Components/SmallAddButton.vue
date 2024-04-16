<template>
    <button @click="$emit('clicked')">
        <Icon icon="lets-icons:add-duotone" width="30" color="#10b981" />
    </button>
</template>

<script setup>
import { Icon } from "@iconify/vue";
</script>

<style lang="scss" scoped></style>
