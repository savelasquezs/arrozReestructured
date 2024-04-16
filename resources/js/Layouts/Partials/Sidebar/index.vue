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
                <ItemSidebar
                    href="/ventas"
                    name="Ventas"
                    icon_name="ph:cash-register"
                />

                <ItemSidebar
                    href="/gastos"
                    name="Gastos"
                    icon_name="mingcute:receive-money-fill"
                />
            </ul>
        </div>
    </aside>
</template>

<script setup>
import ItemSidebar from "./ItemSidebar.vue";
</script>

<style lang="scss" scoped></style>
