<template>
    <aside
        id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar"
    >
        <div
            class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800"
        >
            <ul class="space-y-2 font-medium">
                <ItemSidebar href="/ventas" name="Ventas">
                    <template #icon>
                        <BeakerIcon class="h-6 w-6 text-blue-500" />
                    </template>
                </ItemSidebar>
                <ItemSidebar href="/gastos" name="Gastos">
                    <template #icon>
                        <BeakerIcon class="h-6 w-6 text-blue-500" />
                    </template>
                </ItemSidebar>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import ItemSidebar from "./ItemSidebar.vue";
import { BeakerIcon } from "@heroicons/vue/24/solid";
</script>

<style lang="scss" scoped></style>
