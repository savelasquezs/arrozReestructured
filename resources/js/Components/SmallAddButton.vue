<template>
    <button @click="$emit('clicked')" type="button">
        <Icon
            :icon="
                editing
                    ? 'fluent:person-edit-48-filled'
                    : 'lets-icons:add-duotone'
            "
            width="30"
            :color="editing ? '#fcd34d' : '#10b981'"
        />
    </button>
</template>

<script setup>
import { Icon } from "@iconify/vue";
defineProps({ editing: Boolean });
defineEmits(["clicked"]);
</script>

<style lang="scss" scoped></style>
